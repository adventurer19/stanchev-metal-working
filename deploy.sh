#!/bin/bash
set -e

echo "🚀 Deploy..."

cd /opt/projects/stanchev-metal-working

# Stop containers
docker compose -f docker-compose.prod.yml down

# Fix permissions FIRST (before git operations)
sudo chown -R ubuntu:ubuntu .

# Clean
sudo rm -rf vendor/ node_modules/ public/build/ bootstrap/cache/* storage/framework/cache/* storage/framework/sessions/* storage/framework/views/*

# Pull latest
git fetch origin
git reset --hard origin/main
git clean -fd

# Create directories & fix permissions for Docker
sudo mkdir -p vendor/ node_modules/ public/build/ storage/framework/{cache,sessions,views} bootstrap/cache/
sudo chown -R www-data:www-data storage/ bootstrap/cache/ vendor/ node_modules/ public/build/
sudo chmod -R 775 storage/ bootstrap/cache/

# Start
docker compose -f docker-compose.prod.yml up -d
sleep 10

# Install & Build
docker compose -f docker-compose.prod.yml exec -T stanchev-app composer install --no-dev --optimize-autoloader
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm ci --omit=dev
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize

# Fix permissions & Restart
sudo chown -R www-data:www-data vendor/ node_modules/ public/build/ storage/ bootstrap/cache/
docker compose -f docker-compose.prod.yml restart

echo "✅ Done! https://stanchevisin.com"

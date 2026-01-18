#!/bin/bash
set -e

echo "🚀 Deploy..."

cd /opt/projects/stanchev-metal-working

# Stop containers
docker compose -f docker-compose.prod.yml down

# Fix ALL permissions
sudo chown -R ubuntu:ubuntu .

# Nuclear clean - remove EVERYTHING
sudo rm -rf vendor/ node_modules/ public/build/ bootstrap/cache/ storage/framework/

# Pull latest
git fetch origin
git reset --hard origin/main
git clean -fd

# Recreate structure
sudo mkdir -p storage/framework/{cache,sessions,views}
sudo mkdir -p bootstrap/cache
sudo mkdir -p vendor node_modules public/build

# Set correct ownership for Docker
sudo chown -R www-data:www-data storage bootstrap/cache vendor node_modules public/build
sudo chmod -R 775 storage bootstrap/cache

# Create .gitkeep files
sudo touch storage/framework/cache/.gitkeep
sudo touch storage/framework/sessions/.gitkeep  
sudo touch storage/framework/views/.gitkeep
sudo touch bootstrap/cache/.gitkeep
sudo chown www-data:www-data storage/framework/cache/.gitkeep storage/framework/sessions/.gitkeep storage/framework/views/.gitkeep bootstrap/cache/.gitkeep

# Start containers
docker compose -f docker-compose.prod.yml up -d
sleep 15

# Install dependencies (inside container where permissions are correct)
echo "📦 Installing Composer dependencies..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app composer clear-cache
docker compose -f docker-compose.prod.yml exec -T stanchev-app composer install --no-dev --optimize-autoloader --no-interaction

echo "📦 Installing NPM dependencies..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm ci --omit=dev

echo "🔨 Building assets..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build

echo "💾 Optimizing Laravel..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize

# Final restart
docker compose -f docker-compose.prod.yml restart

echo ""
echo "✅ Done! https://stanchevisin.com"

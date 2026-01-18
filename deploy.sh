#!/bin/bash
set -e

echo "🚀 Deploy..."

cd /opt/projects/stanchev-metal-working

# Stop containers
docker compose -f docker-compose.prod.yml down

# Fix permissions
sudo chown -R ubuntu:ubuntu .

# Clean everything
sudo rm -rf vendor/ node_modules/ public/build/ bootstrap/cache/ storage/framework/

# Pull latest
git fetch origin
git reset --hard origin/main
git clean -fd

# Recreate Laravel structure
sudo mkdir -p storage/framework/{cache,sessions,views}
sudo mkdir -p bootstrap/cache
sudo touch storage/framework/cache/.gitkeep
sudo touch storage/framework/sessions/.gitkeep  
sudo touch storage/framework/views/.gitkeep
sudo touch bootstrap/cache/.gitkeep

# Build and start (will rebuild if Dockerfile changed)
echo "🔨 Building containers..."
docker compose -f docker-compose.prod.yml build --no-cache
docker compose -f docker-compose.prod.yml up -d
sleep 15

# Now install inside container (as www-data user)
echo "📦 Installing dependencies..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app composer install --no-dev --optimize-autoloader --no-interaction
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm ci --omit=dev
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize

# Restart
docker compose -f docker-compose.prod.yml restart

echo ""
echo "✅ Done! https://stanchevisin.com"

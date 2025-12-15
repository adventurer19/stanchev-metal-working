#!/bin/bash
set -e

echo "🚀 Stanchev Metalworking - Deploy"
echo "=================================="

PROJECT_DIR="/opt/projects/stanchev-metal-working"

cd $PROJECT_DIR

echo ""
echo "📥 Git pull..."
git pull origin main

echo ""
echo "🔧 Fix permissions..."
sudo chown -R www-data:www-data storage bootstrap/cache node_modules public/build vendor 2>/dev/null || true
sudo chmod -R 775 storage bootstrap/cache 2>/dev/null || true
sudo chown -R ubuntu:ubuntu .git 2>/dev/null || true

echo ""
echo "🔨 Build assets..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build

echo ""
echo "💾 Optimize Laravel..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize

echo ""
echo "🔧 Fix permissions again..."
sudo chown -R www-data:www-data storage bootstrap/cache node_modules public/build vendor 2>/dev/null || true

echo ""
echo "🔄 Restart app..."
docker compose -f docker-compose.prod.yml restart stanchev-app

echo ""
echo "✅ Deploy complete!"
echo "🌐 https://stanchevisin.com"

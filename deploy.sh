#!/bin/bash
set -e

echo "🚀 Stanchev Metalworking - Deploy"
echo "=================================="

PROJECT_DIR="/opt/projects/stanchev-metal-working"

# Check if --rebuild flag is passed
REBUILD=false
if [[ "$1" == "--rebuild" ]]; then
    REBUILD=true
    echo "⚠️  REBUILD MODE - Will rebuild Docker containers"
fi

cd $PROJECT_DIR

echo ""
echo "📥 Git pull..."
BEFORE_PULL=$(git rev-parse HEAD)
git pull origin main
AFTER_PULL=$(git rev-parse HEAD)

# Check if Dockerfile or docker-compose changed in the pull
CHANGED_FILES=$(git diff --name-only $BEFORE_PULL $AFTER_PULL 2>/dev/null || echo "")

# Rebuild containers if flag is set or if Dockerfile/docker-compose changed
if [ "$REBUILD" = true ] || echo "$CHANGED_FILES" | grep -q -E "Dockerfile|docker-compose"; then
    echo ""
    echo "🔨 Rebuilding Docker containers..."
    docker compose -f docker-compose.prod.yml down
    docker compose -f docker-compose.prod.yml build --no-cache
    docker compose -f docker-compose.prod.yml up -d
    echo "⏳ Waiting for containers to start..."
    sleep 10
fi

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

#!/bin/bash
# Бърз deployment скрипт за ежедневни промени
# Използвай този скрипт когато правиш промени в код, CSS, или templates

set -e

echo "🚀 Quick Deploy - Stanchev Metalworking"
echo "========================================"

PROJECT_DIR="/opt/projects/stanchev-metal-working"

echo ""
echo "📥 Pulling latest code from Git..."
cd $PROJECT_DIR
git pull origin main

echo ""
echo "🔨 Building assets..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build

echo ""
echo "💾 Optimizing Laravel..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize

echo ""
echo "✅ Deployment completed!"
echo ""
echo "🌐 Check your site: https://stanchevisin.com"


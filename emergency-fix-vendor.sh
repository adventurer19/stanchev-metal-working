#!/bin/bash

# Emergency fix за повредена vendor/ директория
# Usage: bash emergency-fix-vendor.sh

set -e

echo "🚨 Emergency Fix - Corrupted vendor/ directory"
echo "=============================================="

PROJECT_DIR="/opt/projects/stanchev-metal-working"

cd $PROJECT_DIR

echo ""
echo "🗑️  Removing corrupted vendor/ directory..."
sudo rm -rf vendor/

echo ""
echo "📦 Reinstalling Composer dependencies..."
docker compose -f docker-compose.prod.yml exec -T stanchev-app composer install --no-dev --optimize-autoloader

echo ""
echo "🔧 Fixing permissions..."
sudo chown -R www-data:www-data vendor/ 2>/dev/null || true

echo ""
echo "✅ Vendor directory fixed!"
echo ""
echo "Now try again:"
echo "  bash deploy.sh"

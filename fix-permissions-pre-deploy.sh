#!/bin/bash

# Script за поправка на permissions преди git операции
# Usage: sudo bash fix-permissions-pre-deploy.sh

set -e

echo "🔧 Fixing file permissions for deployment..."
echo "============================================="

PROJECT_DIR="/opt/projects/stanchev-metal-working"

if [ ! -d "$PROJECT_DIR" ]; then
    echo "❌ Project directory does not exist: $PROJECT_DIR"
    exit 1
fi

cd $PROJECT_DIR

echo ""
echo "📝 Setting ubuntu as owner for git operations..."
sudo chown -R ubuntu:ubuntu .

echo ""
echo "🗂️  Setting correct permissions for Laravel directories..."
# Storage and cache need to be writable
sudo chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Make sure www-data can write to these after deployment
sudo find storage -type f -exec chmod 664 {} \; 2>/dev/null || true
sudo find storage -type d -exec chmod 775 {} \; 2>/dev/null || true
sudo find bootstrap/cache -type f -exec chmod 664 {} \; 2>/dev/null || true
sudo find bootstrap/cache -type d -exec chmod 775 {} \; 2>/dev/null || true

echo ""
echo "✅ Permissions fixed!"
echo ""
echo "Now you can run:"
echo "  git pull origin main"
echo "  git checkout ."
echo "  bash deploy.sh"

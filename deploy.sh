#!/bin/bash
set -e

echo "🚀 Starting deployment of Stanchev Metalworking..."

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

PROJECT_DIR="/opt/projects/stanchev-metal-working"
NGINX_DIR="/opt/projects/nginx-container"

# Step 1: Stop current containers
echo -e "${YELLOW}📦 Stopping current containers...${NC}"
cd $PROJECT_DIR
docker compose -f docker-compose.prod.yml down || true

# Step 2: Pull latest changes
echo -e "${YELLOW}📥 Pulling latest changes from git...${NC}"
git pull origin main

# Step 3: Clean up old dependencies
echo -e "${YELLOW}🧹 Cleaning up old dependencies...${NC}"
rm -rf vendor node_modules bootstrap/cache/*.php

# Step 4: Install Composer dependencies
echo -e "${YELLOW}📦 Installing Composer dependencies...${NC}"
composer install --no-dev --optimize-autoloader --no-interaction

# Step 5: Install npm dependencies and build assets
echo -e "${YELLOW}📦 Installing npm dependencies...${NC}"
npm install

echo -e "${YELLOW}🔨 Building assets...${NC}"
npm run build

# Step 6: Laravel optimizations
echo -e "${YELLOW}⚙️  Running Laravel optimizations...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Step 7: Update nginx upstream configuration
echo -e "${YELLOW}🔧 Updating nginx upstream configuration...${NC}"
cd $NGINX_DIR
sed -i.bak 's/stanchev-metal-working-stanchev-app-1/stanchev-app/g' nginx/conf.d/upstreams.conf

# Step 8: Build and start containers
echo -e "${YELLOW}🐳 Building and starting Docker containers...${NC}"
cd $PROJECT_DIR
docker compose -f docker-compose.prod.yml build --no-cache
docker compose -f docker-compose.prod.yml up -d

# Step 9: Wait for containers to be healthy
echo -e "${YELLOW}⏳ Waiting for containers to be ready...${NC}"
sleep 10

# Step 10: Check container status
echo -e "${YELLOW}🔍 Checking container status...${NC}"
docker ps | grep stanchev

# Step 11: Restart nginx
echo -e "${YELLOW}🔄 Restarting nginx...${NC}"
cd $NGINX_DIR
docker compose restart nginx

# Step 12: Test nginx configuration
echo -e "${YELLOW}✅ Testing nginx configuration...${NC}"
docker compose exec nginx nginx -t

echo -e "${GREEN}✅ Deployment completed successfully!${NC}"
echo ""
echo "📊 Container status:"
docker ps | grep -E '(CONTAINER|stanchev|nginx-proxy)'
echo ""
echo "📝 To view logs, run:"
echo "   docker logs -f stanchev-app"
echo ""
echo "🌐 Site should be available at: https://stanchevisin.com"


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

# Step 3: Clean up old dependencies (with sudo for docker-created files)
echo -e "${YELLOW}🧹 Cleaning up old dependencies...${NC}"
sudo rm -rf vendor node_modules public/build
sudo rm -f bootstrap/cache/packages.php bootstrap/cache/services.php storage/framework/cache/data/* 2>/dev/null || true

# Step 4: Update nginx upstream configuration FIRST
echo -e "${YELLOW}🔧 Updating nginx upstream configuration...${NC}"
cd $NGINX_DIR
sed -i.bak 's/stanchev-metal-working-stanchev-app-1/stanchev-app/g' nginx/conf.d/upstreams.conf

# Step 5: Build and start containers
echo -e "${YELLOW}🐳 Building and starting Docker containers...${NC}"
cd $PROJECT_DIR
docker compose -f docker-compose.prod.yml build --no-cache
docker compose -f docker-compose.prod.yml up -d

# Step 6: Wait for database to be ready
echo -e "${YELLOW}⏳ Waiting for database to be ready...${NC}"
sleep 15

# Step 7: Install Composer dependencies INSIDE container
echo -e "${YELLOW}📦 Installing Composer dependencies inside container...${NC}"
docker compose -f docker-compose.prod.yml exec -T stanchev-app composer install --no-dev --optimize-autoloader --no-interaction

# Step 8: Install npm dependencies and build assets INSIDE container
echo -e "${YELLOW}📦 Installing npm dependencies inside container...${NC}"
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm install

echo -e "${YELLOW}🔨 Building assets inside container...${NC}"
docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build

# Step 9: Laravel optimizations INSIDE container
echo -e "${YELLOW}⚙️  Running Laravel optimizations...${NC}"
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan config:cache
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan route:cache
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan view:cache

# Step 10: Check container status
echo -e "${YELLOW}🔍 Checking container status...${NC}"
docker ps | grep stanchev

# Step 11: Fix permissions
echo -e "${YELLOW}🔐 Fixing file permissions...${NC}"
cd $PROJECT_DIR
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Step 12: Restart nginx
echo -e "${YELLOW}🔄 Restarting nginx...${NC}"
cd $NGINX_DIR
docker compose restart nginx

# Step 13: Test nginx configuration
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


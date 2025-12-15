#!/bin/bash
set -e

echo "🚀 Stanchev Metalworking - Production Deployment Script"
echo "========================================================"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Configuration
PROJECT_DIR="/opt/projects/stanchev-metal-working"
NGINX_DIR="/opt/projects/nginx-container"

echo ""
echo -e "${YELLOW}Step 1: Stopping existing containers...${NC}"
cd $PROJECT_DIR
docker compose -f docker-compose.prod.yml down || true

echo ""
echo -e "${YELLOW}Step 2: Pulling latest code from Git...${NC}"
git pull origin main

echo ""
echo -e "${YELLOW}Step 3: Cleaning old dependencies...${NC}"
rm -rf vendor node_modules bootstrap/cache/*.php

echo ""
echo -e "${YELLOW}Step 4: Installing Composer dependencies...${NC}"
composer install --no-dev --optimize-autoloader --no-interaction

echo ""
echo -e "${YELLOW}Step 5: Installing NPM dependencies...${NC}"
npm install

echo ""
echo -e "${YELLOW}Step 6: Building assets...${NC}"
npm run build

echo ""
echo -e "${YELLOW}Step 7: Setting correct permissions...${NC}"
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo ""
echo -e "${YELLOW}Step 8: Updating nginx upstream configuration...${NC}"
cd $NGINX_DIR
# Backup current config
cp nginx/conf.d/upstreams.conf nginx/conf.d/upstreams.conf.bak.$(date +%Y%m%d_%H%M%S)
# Update container name
sed -i 's/stanchev-metal-working-stanchev-app-1/stanchev-app/g' nginx/conf.d/upstreams.conf
echo -e "${GREEN}✓ Upstream configuration updated${NC}"

echo ""
echo -e "${YELLOW}Step 9: Building and starting containers...${NC}"
cd $PROJECT_DIR
docker compose -f docker-compose.prod.yml build --no-cache
docker compose -f docker-compose.prod.yml up -d

echo ""
echo -e "${YELLOW}Step 10: Waiting for containers to be healthy...${NC}"
sleep 10

echo ""
echo -e "${YELLOW}Step 11: Running Laravel optimization commands...${NC}"
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan config:cache
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan route:cache
docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan view:cache

echo ""
echo -e "${YELLOW}Step 12: Running database migrations...${NC}"
read -p "Do you want to run migrations? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan migrate --force
    echo -e "${GREEN}✓ Migrations completed${NC}"
else
    echo -e "${YELLOW}⊘ Migrations skipped${NC}"
fi

echo ""
echo -e "${YELLOW}Step 13: Restarting nginx...${NC}"
cd $NGINX_DIR
docker compose restart nginx

echo ""
echo -e "${YELLOW}Step 14: Testing nginx configuration...${NC}"
docker compose exec nginx nginx -t
if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Nginx configuration is valid${NC}"
else
    echo -e "${RED}✗ Nginx configuration has errors!${NC}"
    exit 1
fi

echo ""
echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}✓ Deployment completed successfully!${NC}"
echo -e "${GREEN}========================================${NC}"

echo ""
echo "Container status:"
docker ps | grep -E '(nginx-proxy|stanchev)'

echo ""
echo "Checking logs (last 20 lines):"
cd $PROJECT_DIR
docker compose -f docker-compose.prod.yml logs --tail=20 stanchev-app

echo ""
echo -e "${YELLOW}Useful commands:${NC}"
echo "  View logs:    cd $PROJECT_DIR && docker compose -f docker-compose.prod.yml logs -f stanchev-app"
echo "  Restart app:  cd $PROJECT_DIR && docker compose -f docker-compose.prod.yml restart stanchev-app"
echo "  Shell access: cd $PROJECT_DIR && docker compose -f docker-compose.prod.yml exec stanchev-app bash"
echo ""
echo -e "${GREEN}Visit: https://stanchevisin.com${NC}"

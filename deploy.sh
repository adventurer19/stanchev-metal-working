#!/usr/bin/env bash
set -euo pipefail

PROJECT_DIR="/opt/projects/stanchev-metal-working"
COMPOSE_FILE="${PROJECT_DIR}/docker-compose.prod.yml"

NGINX_CONTAINER="nginx-proxy"
APP_CONTAINER="stanchev-app"

echo "==> Deploy: $(date)"
cd "$PROJECT_DIR"

echo "==> Git pull"
git fetch origin main
git pull origin main

echo "==> Stop app stack"
docker compose -f "$COMPOSE_FILE" down

echo "==> Clean old caches/deps on host (optional but as you wanted)"
rm -rf node_modules || true
rm -rf vendor || true
rm -rf public/build || true

echo "==> Build & start app stack"
docker compose -f "$COMPOSE_FILE" up -d --build

echo "==> Wait for app container to be up and healthy"
# Wait for container to be healthy (with timeout)
TIMEOUT=60
ELAPSED=0
while [ $ELAPSED -lt $TIMEOUT ]; do
  if docker ps --format '{{.Names}}\t{{.Status}}' | grep "^${APP_CONTAINER}" | grep -q "healthy"; then
    echo "    ✓ App container is healthy"
    break
  fi
  echo "    Waiting for app container... ($ELAPSED/$TIMEOUT seconds)"
  sleep 2
  ELAPSED=$((ELAPSED + 2))
done

if [ $ELAPSED -ge $TIMEOUT ]; then
  echo "    ✗ ERROR: App container did not become healthy in time!"
  exit 1
fi

echo "==> Run database migrations"
docker exec "$APP_CONTAINER" php artisan migrate --force

echo "==> Fix storage permissions"
docker exec "$APP_CONTAINER" chown -R www-data:www-data /var/www/html/storage
docker exec "$APP_CONTAINER" chmod -R 775 /var/www/html/storage

echo "==> Clear Laravel caches"
docker exec "$APP_CONTAINER" php artisan config:clear
docker exec "$APP_CONTAINER" php artisan route:clear
docker exec "$APP_CONTAINER" php artisan view:clear
docker exec "$APP_CONTAINER" php artisan cache:clear || echo "    ⚠ Cache clear failed (not critical)"

echo "==> Sync Vite build assets from app container to host public/"
rm -rf "${PROJECT_DIR}/public/build" || true

# Check if build directory exists in container
if docker exec "$APP_CONTAINER" test -d /var/www/html/public/build; then
    echo "    ✓ Build directory found in container"
    docker cp "${APP_CONTAINER}:/var/www/html/public/build" "${PROJECT_DIR}/public/"
    
    if [ -d "${PROJECT_DIR}/public/build" ]; then
        echo "    ✓ Assets copied successfully to host"
        ls -lh "${PROJECT_DIR}/public/build/"
    else
        echo "    ✗ ERROR: Failed to copy assets to host!"
        exit 1
    fi
else
    echo "    ✗ ERROR: Build directory not found in container!"
    exit 1
fi

echo "==> Test & reload nginx"
docker exec "$NGINX_CONTAINER" nginx -t
docker exec "$NGINX_CONTAINER" nginx -s reload

echo "==> Done."
echo "Check: curl -I https://stanchevisin.com/build/assets/*.css"

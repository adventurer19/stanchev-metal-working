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

echo "==> Wait for app container to be up"
# simple wait loop
for i in {1..30}; do
  if docker ps --format '{{.Names}}' | grep -q "^${APP_CONTAINER}$"; then
    break
  fi
  sleep 1
done

echo "==> Run database migrations"
docker exec "$APP_CONTAINER" php artisan migrate --force

echo "==> Clear Laravel caches"
docker exec "$APP_CONTAINER" php artisan config:clear
docker exec "$APP_CONTAINER" php artisan route:clear
docker exec "$APP_CONTAINER" php artisan view:clear
docker exec "$APP_CONTAINER" php artisan cache:clear

echo "==> Sync Vite build assets from app container to host public/"
rm -rf "${PROJECT_DIR}/public/build" || true
docker cp "${APP_CONTAINER}:/var/www/html/public/build" "${PROJECT_DIR}/public/"

echo "==> Test & reload nginx"
docker exec -it "$NGINX_CONTAINER" nginx -t
docker exec -it "$NGINX_CONTAINER" nginx -s reload

echo "==> Done."
echo "Check: curl -I https://stanchevisin.com/build/assets/*.css"

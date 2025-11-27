#!/bin/bash

echo "🔍 Проверка на статуса на контейнерите..."
docker compose -f docker-compose.prod.yml ps

echo ""
echo "📋 Проверка на PHP-FPM логовете..."
docker compose -f docker-compose.prod.yml logs --tail=30 metalworking-app

echo ""
echo "🌐 Тест на сайта локално..."
curl -I http://localhost:8080

echo ""
echo "📋 Проверка на nginx error логовете..."
docker exec -it metalworking-nginx cat /var/log/nginx/error.log 2>/dev/null || echo "Няма error логове"

echo ""
echo "🔍 Проверка на .env файла..."
docker exec -it metalworking-app grep APP_KEY /var/www/html/.env | head -1

echo ""
echo "✅ Проверка завършена!"




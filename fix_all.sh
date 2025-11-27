#!/bin/bash

set -e

echo "🔧 Поправка на всички проблеми..."

cd /opt/projects/metalworking

echo ""
echo "1️⃣  Актуализиране на кода..."
git pull

echo ""
echo "2️⃣  Поправка на правата..."
sudo chown -R ubuntu:ubuntu .
sudo chmod -R 755 storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

echo ""
echo "3️⃣  Проверка на .env файла..."
if ! grep -q "APP_KEY=base64:" .env; then
    echo "   ⚠️  APP_KEY не е генериран, генерирам..."
    docker exec -it metalworking-app php artisan key:generate --force
else
    echo "   ✅ APP_KEY вече е генериран"
fi

echo ""
echo "4️⃣  Инсталиране на зависимости..."
docker exec -it metalworking-app composer install --no-dev --optimize-autoloader --no-interaction

echo ""
echo "5️⃣  Изпълняване на миграции..."
docker exec -it metalworking-app php artisan migrate --force || echo "   ⚠️  Миграциите вече са изпълнени"

echo ""
echo "6️⃣  Създаване на storage link..."
docker exec -it metalworking-app php artisan storage:link || echo "   ⚠️  Storage link вече съществува"

echo ""
echo "7️⃣  Кеширане на конфигурацията..."
docker exec -it metalworking-app php artisan config:clear
docker exec -it metalworking-app php artisan route:clear
docker exec -it metalworking-app php artisan view:clear
docker exec -it metalworking-app php artisan config:cache
docker exec -it metalworking-app php artisan route:cache
docker exec -it metalworking-app php artisan view:cache

echo ""
echo "8️⃣  Поправка на правата в контейнера..."
docker exec -it metalworking-app chmod -R 775 storage bootstrap/cache
docker exec -it metalworking-app chown -R www-data:www-data storage bootstrap/cache

echo ""
echo "9️⃣  Рестартиране на контейнерите..."
docker compose -f docker-compose.prod.yml restart

echo ""
echo "🔟 Проверка на статуса..."
sleep 5
docker compose -f docker-compose.prod.yml ps

echo ""
echo "✅ Готово! Проверка на сайта:"
echo "   Локално: curl -I http://localhost:8080"
echo "   Отвън: http://172.31.16.63:8080"

echo ""
echo "📋 Последни логове:"
docker compose -f docker-compose.prod.yml logs --tail=10




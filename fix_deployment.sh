#!/bin/bash

echo "🔍 Проверка на статуса на контейнерите..."
docker compose -f docker-compose.prod.yml ps

echo ""
echo "📋 Проверка на логовете на Nginx..."
docker compose -f docker-compose.prod.yml logs --tail=50 metalworking-nginx

echo ""
echo "📋 Проверка на логовете на PHP-FPM..."
docker compose -f docker-compose.prod.yml logs --tail=50 metalworking-app

echo ""
echo "🔧 Поправка на правата..."
cd /opt/projects/metalworking
sudo chown -R ubuntu:ubuntu .
sudo chmod -R 755 storage bootstrap/cache

echo ""
echo "🔑 Генериране на APP_KEY..."
docker exec -it metalworking-app php artisan key:generate --force || echo "⚠️  APP_KEY вече е генериран"

echo ""
echo "📦 Инсталиране на зависимости..."
docker exec -it metalworking-app composer install --no-dev --optimize-autoloader --no-interaction

echo ""
echo "🗄️  Изпълняване на миграции..."
docker exec -it metalworking-app php artisan migrate --force || echo "⚠️  Миграциите вече са изпълнени"

echo ""
echo "🔗 Създаване на storage link..."
docker exec -it metalworking-app php artisan storage:link || echo "⚠️  Storage link вече съществува"

echo ""
echo "⚙️  Кеширане на конфигурацията..."
docker exec -it metalworking-app php artisan config:clear
docker exec -it metalworking-app php artisan route:clear
docker exec -it metalworking-app php artisan view:clear
docker exec -it metalworking-app php artisan config:cache
docker exec -it metalworking-app php artisan route:cache
docker exec -it metalworking-app php artisan view:cache

echo ""
echo "🔐 Поправка на правата в контейнера..."
docker exec -it metalworking-app chmod -R 775 storage bootstrap/cache
docker exec -it metalworking-app chown -R www-data:www-data storage bootstrap/cache

echo ""
echo "🔄 Рестартиране на контейнерите..."
docker compose -f docker-compose.prod.yml restart

echo ""
echo "✅ Готово! Проверка на логовете:"
docker compose -f docker-compose.prod.yml logs --tail=20


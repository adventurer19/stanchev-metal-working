#!/bin/bash

set -e

echo "🎨 Build на assets на сървъра..."

cd /opt/projects/metalworking

echo ""
echo "1️⃣  Актуализиране на кода..."
git pull

echo ""
echo "2️⃣  Rebuild на Docker образа с Node.js..."
docker compose -f docker-compose.prod.yml build metalworking-app

echo ""
echo "3️⃣  Рестартиране на контейнера..."
docker compose -f docker-compose.prod.yml up -d metalworking-app

echo ""
echo "4️⃣  Изчакване контейнерът да стартира..."
sleep 5

echo ""
echo "5️⃣  Проверка на Node.js и npm..."
docker exec -it metalworking-app node --version
docker exec -it metalworking-app npm --version

echo ""
echo "6️⃣  Инсталиране на npm зависимости..."
docker exec -it metalworking-app sh -c "cd /var/www/html && npm install"

echo ""
echo "7️⃣  Build на Vite assets..."
docker exec -it metalworking-app sh -c "cd /var/www/html && npm run build"

echo ""
echo "8️⃣  Проверка на build файловете..."
docker exec -it metalworking-app ls -la /var/www/html/public/build/assets/ || echo "⚠️  Build директорията не съществува"

echo ""
echo "9️⃣  Поправка на правата..."
docker exec -it metalworking-app chown -R www-data:www-data /var/www/html/public/build
docker exec -it metalworking-app chmod -R 755 /var/www/html/public/build

echo ""
echo "🔟 Рестартиране на nginx..."
docker compose -f docker-compose.prod.yml restart metalworking-nginx

echo ""
echo "1️⃣1️⃣  Изчистване на Laravel cache..."
docker exec -it metalworking-app php artisan view:clear
docker exec -it metalworking-app php artisan config:clear
docker exec -it metalworking-app php artisan config:cache

echo ""
echo "✅ Готово!"
echo ""
echo "💡 Следващи стъпки:"
echo "   1. Изчисти кеша на браузъра (Ctrl+Shift+R)"
echo "   2. Провери сайта: http://3.77.192.218:8080"


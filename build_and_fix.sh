#!/bin/bash

set -e

echo "🔧 Пълна поправка на assets..."

cd /opt/projects/metalworking

echo ""
echo "1️⃣  Актуализиране на кода..."
git pull

echo ""
echo "2️⃣  Проверка на Node.js и npm..."
docker exec -it metalworking-app node --version || echo "⚠️  Node.js не е инсталиран"
docker exec -it metalworking-app npm --version || echo "⚠️  npm не е инсталиран"

echo ""
echo "3️⃣  Инсталиране на зависимости..."
docker exec -it metalworking-app sh -c "cd /var/www/html && npm install --production=false"

echo ""
echo "4️⃣  Build на Vite assets..."
docker exec -it metalworking-app sh -c "cd /var/www/html && npm run build"

echo ""
echo "5️⃣  Проверка на build файловете..."
docker exec -it metalworking-app ls -la /var/www/html/public/build/assets/ || echo "⚠️  Build директорията не съществува"

echo ""
echo "6️⃣  Проверка на manifest.json..."
if docker exec -it metalworking-app test -f /var/www/html/public/build/manifest.json; then
    echo "   ✅ manifest.json съществува"
    docker exec -it metalworking-app head -5 /var/www/html/public/build/manifest.json
else
    echo "   ❌ manifest.json не съществува!"
fi

echo ""
echo "7️⃣  Поправка на правата..."
docker exec -it metalworking-app chown -R www-data:www-data /var/www/html/public/build
docker exec -it metalworking-app chmod -R 755 /var/www/html/public/build

echo ""
echo "8️⃣  Рестартиране на nginx с новата конфигурация..."
docker compose -f docker-compose.prod.yml restart metalworking-nginx

echo ""
echo "9️⃣  Изчистване на Laravel cache..."
docker exec -it metalworking-app php artisan view:clear
docker exec -it metalworking-app php artisan config:clear
docker exec -it metalworking-app php artisan config:cache

echo ""
echo "🔟 Тест на CSS файла..."
docker exec -it metalworking-nginx curl -I http://localhost/build/assets/app-*.css 2>&1 | head -5 || echo "Тест на конкретен файл..."

echo ""
echo "✅ Готово!"
echo ""
echo "💡 Следващи стъпки:"
echo "   1. Изчисти кеша на браузъра (Ctrl+Shift+R)"
echo "   2. Провери в Network tab дали CSS файлът се зарежда"
echo "   3. Провери дали файлът има правилен Content-Type: text/css"


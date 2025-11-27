#!/bin/bash

echo "🎨 Поправка на CSS/JS assets..."

cd /opt/projects/metalworking

echo ""
echo "1️⃣  Проверка дали node_modules съществува..."
if [ ! -d "node_modules" ]; then
    echo "   ⚠️  node_modules не съществува, инсталирам..."
    docker exec -it metalworking-app sh -c "cd /var/www/html && npm install"
else
    echo "   ✅ node_modules съществува"
fi

echo ""
echo "2️⃣  Build на Vite assets за production..."
docker exec -it metalworking-app sh -c "cd /var/www/html && npm run build"

echo ""
echo "3️⃣  Проверка дали build файловете съществуват..."
docker exec -it metalworking-app ls -la /var/www/html/public/build/assets/ 2>/dev/null || echo "   ⚠️  Build директорията не съществува"

echo ""
echo "4️⃣  Проверка на manifest.json..."
docker exec -it metalworking-app cat /var/www/html/public/build/manifest.json 2>/dev/null | head -20 || echo "   ⚠️  manifest.json не съществува"

echo ""
echo "5️⃣  Рестартиране на nginx..."
docker compose -f docker-compose.prod.yml restart metalworking-nginx

echo ""
echo "6️⃣  Изчистване на Laravel view cache..."
docker exec -it metalworking-app php artisan view:clear

echo ""
echo "✅ Готово! Проверка на сайта:"
echo "   http://3.77.192.218:8080"
echo ""
echo "💡 Ако все още не работи, изчисти кеша на браузъра (Ctrl+Shift+R или Cmd+Shift+R)"




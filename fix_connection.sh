#!/bin/bash

echo "🔧 Поправка на connection проблема..."

cd /opt/projects/metalworking

echo ""
echo "1️⃣  Проверка на статуса на контейнерите..."
docker compose -f docker-compose.prod.yml ps

echo ""
echo "2️⃣  Проверка дали nginx слуша на порт 8080..."
sudo netstat -tlnp | grep 8080 || sudo ss -tlnp | grep 8080 || echo "⚠️  Порт 8080 не слуша"

echo ""
echo "3️⃣  Проверка на Docker портовете..."
docker port metalworking-nginx 2>/dev/null || echo "⚠️  Контейнерът не е стартиран"

echo ""
echo "4️⃣  Рестартиране на всички контейнери..."
docker compose -f docker-compose.prod.yml down
docker compose -f docker-compose.prod.yml up -d

echo ""
echo "5️⃣  Изчакване контейнерите да стартират..."
sleep 10

echo ""
echo "6️⃣  Проверка на статуса отново..."
docker compose -f docker-compose.prod.yml ps

echo ""
echo "7️⃣  Проверка на портовете отново..."
sudo netstat -tlnp | grep 8080 || sudo ss -tlnp | grep 8080

echo ""
echo "8️⃣  Тест локално..."
curl -I http://localhost:8080 2>&1 | head -5

echo ""
echo "9️⃣  Проверка на nginx логовете..."
docker compose -f docker-compose.prod.yml logs --tail=20 metalworking-nginx

echo ""
echo "✅ Проверката завърши!"
echo ""
echo "💡 Ако порт 8080 все още не слуша, провери:"
echo "   1. Дали контейнерът е стартиран: docker ps | grep metalworking"
echo "   2. Дали има конфликт с друг контейнер на порт 8080"
echo "   3. Дали firewall блокира порта"




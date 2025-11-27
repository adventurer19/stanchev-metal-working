#!/bin/bash

echo "🔍 Пълна диагностика на проблемите..."
echo ""

cd /opt/projects/metalworking

echo "1️⃣  Проверка на статуса на контейнерите:"
docker compose -f docker-compose.prod.yml ps
echo ""

echo "2️⃣  Проверка дали nginx слуша на порт 8080:"
sudo netstat -tlnp | grep 8080 || sudo ss -tlnp | grep 8080
echo ""

echo "3️⃣  Проверка на Docker портовете:"
docker port metalworking-nginx 2>/dev/null || echo "Контейнерът не е стартиран"
echo ""

echo "4️⃣  Тест локално на сървъра:"
curl -I http://localhost:8080 2>&1 | head -10
echo ""

echo "5️⃣  Тест от контейнера:"
docker exec -it metalworking-nginx curl -I http://localhost 2>&1 | head -10
echo ""

echo "6️⃣  Проверка на nginx конфигурацията:"
docker exec -it metalworking-nginx nginx -t 2>&1
echo ""

echo "7️⃣  Проверка на nginx логовете:"
docker compose -f docker-compose.prod.yml logs --tail=20 metalworking-nginx | grep -E "(error|warn|GET|POST)" || echo "Няма грешки в логовете"
echo ""

echo "8️⃣  Проверка на PHP-FPM логовете:"
docker compose -f docker-compose.prod.yml logs --tail=20 metalworking-app | grep -E "(error|ERROR|Fatal)" || echo "Няма критични грешки"
echo ""

echo "9️⃣  Проверка на Laravel логовете:"
docker exec -it metalworking-app tail -20 /var/www/html/storage/logs/laravel.log 2>/dev/null | tail -5 || echo "Няма логове"
echo ""

echo "🔟 Проверка на firewall:"
sudo ufw status | grep 8080 || echo "Порт 8080 не е в ufw правилата"
echo ""

echo "✅ Диагностиката завърши!"




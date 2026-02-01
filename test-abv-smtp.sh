#!/bin/bash

# Script за тестване на различни ABV.BG SMTP настройки

echo "🧪 Тестване на ABV.BG SMTP настройки..."
echo ""

# Вариант 1: Порт 587 с TLS (често работи по-добре)
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "Вариант 1: Порт 587 с TLS"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Backup на .env
cp .env .env.backup.test

# Промяна на настройките
sed -i.bak 's/^MAIL_PORT=.*/MAIL_PORT=587/' .env
sed -i.bak 's/^MAIL_ENCRYPTION=.*/MAIL_ENCRYPTION=tls/' .env

echo "Обновени настройки:"
grep -E "^(MAIL_PORT|MAIL_ENCRYPTION)=" .env

echo ""
echo "Рестартиране на контейнера..."
docker compose down app
docker compose up -d app
sleep 5

echo ""
echo "Тестване..."
docker exec metalworking-app php artisan mail:test 2>&1 | grep -A 5 "Изпращане\|Грешка\|успешно"

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
read -p "Работи ли? (y/n): " works

if [ "$works" != "y" ]; then
    echo ""
    echo "Връщане на оригиналните настройки..."
    mv .env.backup.test .env
    docker compose down app
    docker compose up -d app
    echo "Върнати са оригиналните настройки (465/SSL)"
fi

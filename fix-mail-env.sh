#!/bin/bash

# Script за оправяне на mail настройките в .env файла
# Премахва кавичките и оправя MAIL_EHLO_DOMAIN

echo "🔧 Оправяне на mail настройките в .env файла..."
echo ""

# Проверка дали .env файлът съществува
if [ ! -f .env ]; then
    echo "❌ .env файлът не е намерен!"
    exit 1
fi

# Създаване на backup
cp .env .env.backup.$(date +%Y%m%d_%H%M%S)
echo "✅ Backup създаден: .env.backup.*"

# Премахване на кавичките от mail настройките
echo "🔧 Премахване на кавичките от mail настройките..."

# Премахване на кавичките (и двойни, и единични)
sed -i.bak 's/^MAIL_USERNAME="\(.*\)"/MAIL_USERNAME=\1/' .env
sed -i.bak 's/^MAIL_USERNAME='"'"'\(.*\)'"'"'/MAIL_USERNAME=\1/' .env
sed -i.bak 's/^MAIL_PASSWORD="\(.*\)"/MAIL_PASSWORD=\1/' .env
sed -i.bak 's/^MAIL_PASSWORD='"'"'\(.*\)'"'"'/MAIL_PASSWORD=\1/' .env
sed -i.bak 's/^MAIL_FROM_ADDRESS="\(.*\)"/MAIL_FROM_ADDRESS=\1/' .env
sed -i.bak 's/^MAIL_FROM_ADDRESS='"'"'\(.*\)'"'"'/MAIL_FROM_ADDRESS=\1/' .env
sed -i.bak 's/^COMPANY_EMAIL="\(.*\)"/COMPANY_EMAIL=\1/' .env
sed -i.bak 's/^COMPANY_EMAIL='"'"'\(.*\)'"'"'/COMPANY_EMAIL=\1/' .env

# Добавяне/обновяване на MAIL_EHLO_DOMAIN
if grep -q "^MAIL_EHLO_DOMAIN=" .env; then
    sed -i.bak 's/^MAIL_EHLO_DOMAIN=.*/MAIL_EHLO_DOMAIN=abv.bg/' .env
else
    echo "" >> .env
    echo "MAIL_EHLO_DOMAIN=abv.bg" >> .env
fi

echo "✅ .env файлът е оправен!"
echo ""
echo "📋 Променени настройки:"
grep -E "^(MAIL_USERNAME|MAIL_PASSWORD|MAIL_FROM_ADDRESS|MAIL_EHLO_DOMAIN|COMPANY_EMAIL)=" .env | head -6

echo ""
echo "🔄 Рестартиране на контейнера..."
docker compose down app
docker compose up -d app

echo ""
echo "⏳ Изчакване 5 секунди..."
sleep 5

echo ""
echo "📧 Проверка на конфигурацията..."
docker exec metalworking-app php check-email-config.php

echo ""
echo "✅ Готово! Опитай да изпратиш тестов имейл:"
echo "   docker exec metalworking-app php artisan mail:test"

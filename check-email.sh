#!/bin/bash

# Script за проверка на email конфигурацията в Docker
# Използвай: bash check-email.sh

CONTAINER_NAME="metalworking-app"

# Проверка дали контейнерът работи
if ! docker ps --format '{{.Names}}' | grep -q "^${CONTAINER_NAME}$"; then
    echo "❌ Контейнерът ${CONTAINER_NAME} не работи!"
    echo "   Стартирай го с: docker compose up -d"
    exit 1
fi

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "📧 Проверка на Email Конфигурация"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo ""

# Изпълняване на check скрипта в контейнера
docker exec ${CONTAINER_NAME} php check-email-config.php

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "💡 Ако не виждаш промените след редактиране на .env:"
echo "   1. Рестартирай контейнера: docker compose restart app"
echo "   2. Изчисти конфигурационния кеш: docker exec ${CONTAINER_NAME} php artisan config:clear"
echo "   3. Провери отново: bash check-email.sh"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

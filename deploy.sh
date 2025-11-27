#!/bin/bash

# Скрипт за разгръщане на сървъра

set -e

echo "🚀 Starting deployment..."

# Проверка за .env файл
if [ ! -f .env ]; then
    echo "⚠️  .env file not found. Creating from .env.example..."
    if [ -f .env.example ]; then
        cp .env.example .env
    else
        echo "❌ .env.example not found. Please create .env manually."
        exit 1
    fi
fi

# Инсталиране на зависимости
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Генериране на APP_KEY ако няма
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating APP_KEY..."
    php artisan key:generate --force
fi

# Кеширане на конфигурацията
echo "⚙️  Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Миграции
echo "🗄️  Running migrations..."
php artisan migrate --force

# Storage link
echo "🔗 Creating storage link..."
php artisan storage:link || true

# Permissions
echo "🔐 Setting permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "✅ Deployment completed!"




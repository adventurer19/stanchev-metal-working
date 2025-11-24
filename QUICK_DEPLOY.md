# Бързо разгръщане - Следващи стъпки

## Стъпка 1: Поправи правата на файловете

```bash
cd /opt/projects/metalworking
sudo chown -R ubuntu:ubuntu .
```

## Стъпка 2: Актуализирай .env файла

```bash
nano .env
```

Поправи следните важни настройки:

```env
APP_NAME=Metalworking
APP_ENV=production
APP_DEBUG=false
APP_URL=http://YOUR_SERVER_IP:8080  # Замени с IP на сървъра

# Database настройки
DB_HOST=metalworking-mysql
DB_DATABASE=metalworking
DB_USERNAME=metalworking
DB_PASSWORD=твоя_сигурна_парола  # Промени това!

# Locale
APP_LOCALE=bg
APP_FALLBACK_LOCALE=en

# Logging
LOG_LEVEL=error

# Session
SESSION_DRIVER=database
```

**Важно:** Генерирай нов APP_KEY:
```bash
# След като стартираш контейнерите, изпълни:
docker exec -it metalworking-app php artisan key:generate
```

## Стъпка 3: Стартирай Docker контейнерите

```bash
# Проверка на Docker версията
docker compose version  # Нова версия (препоръчително)
# или
docker-compose --version  # Стара версия

# Build и стартиране (опитай първо новата версия)
docker compose -f docker-compose.prod.yml up -d --build

# Ако не работи, опитай старата версия:
# docker-compose -f docker-compose.prod.yml up -d --build

# Проверка на статуса
docker compose -f docker-compose.prod.yml ps
# или
# docker-compose -f docker-compose.prod.yml ps
```

## Стъпка 4: Изпълни миграции и настройки

```bash
# Влез в контейнера
docker exec -it metalworking-app sh

# В контейнера:
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link

# Излез
exit
```

## Стъпка 5: Проверка

```bash
# Проверка на логовете
docker-compose -f docker-compose.prod.yml logs -f

# Проверка на контейнерите
docker ps | grep metalworking
```

## Стъпка 6: Отвори сайта

Отвори в браузър: `http://YOUR_SERVER_IP:8080`

## Ако има проблеми:

```bash
# Преглед на логове
docker-compose -f docker-compose.prod.yml logs metalworking-app
docker-compose -f docker-compose.prod.yml logs metalworking-nginx
docker-compose -f docker-compose.prod.yml logs metalworking-mysql

# Рестартиране
docker-compose -f docker-compose.prod.yml restart

# Пълно рестартиране
docker-compose -f docker-compose.prod.yml down
docker-compose -f docker-compose.prod.yml up -d
```


# Диагностика и поправка на проблеми

## Проверка на статуса на контейнерите

```bash
# Проверка на всички контейнери
docker compose -f docker-compose.prod.yml ps

# Проверка на логовете на всеки контейнер
docker compose -f docker-compose.prod.yml logs metalworking-app
docker compose -f docker-compose.prod.yml logs metalworking-nginx
docker compose -f docker-compose.prod.yml logs metalworking-mysql
```

## Често срещани проблеми и решения

### Проблем 1: Nginx не може да намери PHP-FPM

```bash
# Проверка дали PHP-FPM работи
docker exec -it metalworking-app php -v

# Проверка на nginx конфигурацията
docker exec -it metalworking-nginx cat /etc/nginx/conf.d/default.conf
```

### Проблем 2: Права на файловете

```bash
# Поправи правата
cd /opt/projects/metalworking
sudo chown -R ubuntu:ubuntu .
sudo chmod -R 755 storage bootstrap/cache
```

### Проблем 3: APP_KEY не е генериран

```bash
docker exec -it metalworking-app php artisan key:generate
docker exec -it metalworking-app php artisan config:clear
docker exec -it metalworking-app php artisan config:cache
```

### Проблем 4: Storage директорията

```bash
docker exec -it metalworking-app php artisan storage:link
docker exec -it metalworking-app chmod -R 775 storage
docker exec -it metalworking-app chown -R www-data:www-data storage
```

### Проблем 5: Проверка на .env файла

```bash
# Проверка дали .env файлът е правилен
cat .env | grep APP_KEY
cat .env | grep DB_HOST
```

### Проблем 6: Рестартиране на контейнерите

```bash
docker compose -f docker-compose.prod.yml restart
# или
docker compose -f docker-compose.prod.yml down
docker compose -f docker-compose.prod.yml up -d
```


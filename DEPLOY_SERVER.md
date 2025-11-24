# Инструкции за разгръщане на AWS сървъра

## Стъпка 1: Клониране на репозитория на сървъра

```bash
ssh maire-atelier
cd ~
mkdir -p projects
cd projects
git clone git@github.com-personal:adventurer19/stanchev-metal-working.git metalworking
cd metalworking
```

## Стъпка 2: Създаване на .env файл

```bash
cp .env.example .env
nano .env
```

Попълни следните променливи:
```env
APP_NAME=Metalworking
APP_ENV=production
APP_KEY=  # Ще се генерира автоматично
APP_DEBUG=false
APP_URL=http://YOUR_SERVER_IP:8080  # или домейн ако имаш

DB_CONNECTION=mysql
DB_HOST=metalworking-mysql
DB_PORT=3306
DB_DATABASE=metalworking
DB_USERNAME=metalworking
DB_PASSWORD=твоя_сигурна_парола

# Използвай съществуващия Redis ако искаш
REDIS_HOST=maire-redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## Стъпка 3: Стартиране на Docker контейнерите

```bash
# Build и стартиране
docker-compose -f docker-compose.prod.yml up -d --build

# Проверка на статуса
docker-compose -f docker-compose.prod.yml ps
```

## Стъпка 4: Изпълняване на deployment скрипта

```bash
# Влез в контейнера
docker exec -it metalworking-app sh

# Изпълни deployment скрипта
chmod +x deploy.sh
./deploy.sh

# Или ръчно:
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan storage:link
```

## Стъпка 5: Настройка на Nginx (ако искаш да използваш същия nginx)

### Опция A: Отделен порт (8080) - по-лесно за тестване
Сайтът ще е достъпен на: `http://YOUR_SERVER_IP:8080`

### Опция B: Интеграция в съществуващия nginx

1. Копирай nginx конфигурацията в основния nginx контейнер:
```bash
# Копирай конфигурацията
docker cp docker/nginx/nginx-main.conf maire-nginx:/etc/nginx/conf.d/metalworking.conf

# Рестартирай nginx
docker exec maire-nginx nginx -t  # Проверка на конфигурацията
docker exec maire-nginx nginx -s reload
```

2. Копирай файловете в nginx контейнера:
```bash
docker cp /home/ubuntu/projects/metalworking/public maire-nginx:/var/www/metalworking/public
```

## Стъпка 6: Проверка

```bash
# Проверка на логовете
docker-compose -f docker-compose.prod.yml logs -f

# Проверка на контейнерите
docker ps | grep metalworking
```

## Стъпка 7: Firewall настройки (ако е необходимо)

```bash
sudo ufw allow 8080/tcp
```

## Полезни команди

```bash
# Рестартиране на контейнерите
docker-compose -f docker-compose.prod.yml restart

# Спиране
docker-compose -f docker-compose.prod.yml down

# Преглед на логове
docker-compose -f docker-compose.prod.yml logs -f metalworking-app

# Влизане в контейнера
docker exec -it metalworking-app sh

# Изпълняване на artisan команди
docker exec -it metalworking-app php artisan migrate
```

## Обновяване на кода

```bash
cd ~/projects/metalworking
git pull
docker-compose -f docker-compose.prod.yml up -d --build
docker exec -it metalworking-app php artisan config:cache
docker exec -it metalworking-app php artisan route:cache
docker exec -it metalworking-app php artisan view:cache
```

## Важни бележки

- MySQL е на порт **3307** за да не конфликтира с съществуващия MySQL (3306)
- Nginx е на порт **8080** за тестване
- Можеш да използваш съществуващия Redis контейнер (`maire-redis`)
- За production, препоръчително е да използваш SSL/HTTPS


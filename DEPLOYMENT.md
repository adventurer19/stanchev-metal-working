# Инструкции за деплой на сървъра

## Структура

- **Локално**: Използва `docker-compose.yml` с nginx контейнер (порт 8080)
- **Production**: Използва `docker-compose.prod.yml` БЕЗ nginx контейнер (използва общия nginx от maire-atelier)

## Деплой на сървъра

### 1. Копиране на проекта на сървъра

```bash
# На локалната машина
scp -r . user@maire-atelier:/opt/projects/stanchev-metal-working/
```

### 2. На сървъра - Стартиране на контейнерите

```bash
ssh maire-atelier
cd /opt/projects/stanchev-metal-working

# Използвай production docker-compose файла
docker-compose -f docker-compose.prod.yml up -d --build
```

### 3. Настройка на nginx конфигурацията

**Важно**: Трябва да добавиш volume mapping в nginx контейнера на maire-atelier проекта.

Първо, провери docker-compose.yml на maire-atelier и добави volume за stanchev проекта:

```yaml
# В maire-atelier/docker-compose.yml, в nginx-prod service:
nginx-prod:
  # ... други настройки ...
  volumes:
    - ./docker/nginx/nginx.conf:/etc/nginx/nginx.conf:ro
    - ./docker/nginx/conf.d/app-multi-ssl.conf:/etc/nginx/conf.d/default.conf:ro
    # Maire-atelier volumes
    - ./backend/public:/var/www/html/public:ro
    # Stanchev-metal-working volumes
    - ../stanchev-metal-working/public:/var/www/stanchev/public:ro  # ДОБАВИ/РАЗКОМЕНТИРАЙ ТОВА
    # SSL certificates
    - /etc/letsencrypt:/etc/letsencrypt:ro
    - /var/www/certbot:/var/www/certbot:ro
  # ... други настройки ...
```

**Забележка**: Пътят трябва да сочи към `public` директорията на stanchev проекта!

След това добави съдържанието от `docker/nginx/production.conf` към:
`/opt/projects/maire-atelier/app-multi-ssl.conf`

```bash
# На сървъра
cd /opt/projects/maire-atelier

# Добави upstream блок (в началото на файла, след другите upstreams):
upstream stanchev_php_backend {
    server stanchev-metalworking-app:9000;
}

# Добави server блоковете от production.conf (HTTP и HTTPS)
```

### 4. Рестартиране на nginx контейнера

```bash
# На сървъра в maire-atelier директорията
docker-compose restart nginx
# или
docker-compose exec nginx nginx -s reload
```

### 5. Настройка на .env файла

```bash
cd /opt/projects/stanchev-metal-working
cp .env.example .env
nano .env
```

Важни настройки:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://stanchev-metal-working.com

DB_CONNECTION=mysql
DB_HOST=stanchev-metalworking-mysql
DB_PORT=3306
DB_DATABASE=metalworking
DB_USERNAME=metalworking
DB_PASSWORD=твоята_парола
```

### 6. Изпълняване на миграции

```bash
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force
```

### 7. Оптимизация

```bash
docker-compose -f docker-compose.prod.yml exec app php artisan config:cache
docker-compose -f docker-compose.prod.yml exec app php artisan route:cache
docker-compose -f docker-compose.prod.yml exec app php artisan view:cache
```

## Важни бележки

1. **Мрежа**: Production контейнерите използват `maire-network` (външна мрежа)
   - Ако мрежата се казва различно, провери в maire-atelier/docker-compose.yml
   - Промени `external: true` и името на мрежата в `docker-compose.prod.yml`
2. **Nginx**: НЕ стартира nginx контейнер, използва се общият от maire-atelier
3. **MySQL порт**: Използва порт 3308 (различен от maire проекта)
4. **Container имена**: `stanchev-metalworking-app` и `stanchev-metalworking-mysql`
5. **Volume mapping**: Трябва да се добави volume в nginx контейнера на maire-atelier

## Проверка

```bash
# Проверка на контейнерите
docker-compose -f docker-compose.prod.yml ps

# Проверка на логове
docker-compose -f docker-compose.prod.yml logs -f app

# Проверка на nginx конфигурацията
docker-compose -f /opt/projects/maire-atelier/docker-compose.yml exec nginx nginx -t
```


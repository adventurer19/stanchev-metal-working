# Metalworking Website - Laravel Project

## Локална разработка

### Стартиране

```bash
# Стартиране на всички контейнери (включително nginx)
docker-compose up -d

# Инсталиране на зависимости
docker-compose exec app composer install
npm install

# Генериране на APP_KEY
docker-compose exec app php artisan key:generate

# Изпълняване на миграции
docker-compose exec app php artisan migrate

# Стартиране на Vite dev сървър (в отделен терминал)
npm run dev
```

**Достъп**: http://localhost:8080

## Production (на сървъра)

### Важно

- На сървъра се използва `docker-compose.prod.yml` (БЕЗ nginx контейнер)
- Nginx се управлява от общия контейнер в `maire-atelier` проекта
- Виж `DEPLOYMENT.md` за пълни инструкции

### Бърз старт на сървъра

```bash
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
docker compose -f docker-compose.prod.yml up -d --build
```

## Структура на файловете

- `docker-compose.yml` - за локална разработка (с nginx)
- `docker-compose.prod.yml` - за production (без nginx)
- `docker/nginx/default.conf` - nginx конфиг за локална разработка
- `docker/nginx/production.conf` - nginx конфиг за сървъра (добавя се към maire-atelier nginx)

## Полезни команди

### Локално
```bash
docker-compose ps                    # Статус на контейнерите
docker-compose logs -f app          # Логове
docker-compose exec app php artisan [команда]
docker-compose down                  # Спиране
```

### Production
```bash
docker-compose -f docker-compose.prod.yml ps
docker-compose -f docker-compose.prod.yml logs -f app
docker-compose -f docker-compose.prod.yml exec app php artisan [команда]
```

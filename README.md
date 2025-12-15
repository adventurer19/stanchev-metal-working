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

## Production Deployment

```bash
# Локално
git add .
git commit -m "Промени"
git push

# Deploy
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash deploy.sh"

# Deploy с rebuild (ако промениш Dockerfile)
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash deploy.sh --rebuild"
```

Виж **[DEPLOYMENT.md](DEPLOYMENT.md)** за troubleshooting

## Структура на файловете

### Файлове
- `docker-compose.yml` - локална разработка
- `docker-compose.prod.yml` - production
- `deploy.sh` - **ЕДИНСТВЕНИЯТ deployment скрипт**
- `DEPLOYMENT.md` - troubleshooting

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

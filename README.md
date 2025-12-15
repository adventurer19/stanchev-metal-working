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

### 🚀 Бърз Deploy (ежедневни промени)

```bash
# От твоя локален компютър
git add .
git commit -m "Описание на промените"
git push origin main

# Deploy на сървъра
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash quick-deploy.sh"
```

### 🔧 Пълен Deploy (с нови зависимости)

```bash
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash deploy.sh"
```

### 📚 Пълна документация

Виж **[DEPLOYMENT.md](DEPLOYMENT.md)** за:
- Различни deployment сценарии
- Troubleshooting
- Rollback процедури
- Best practices

## Структура на файловете

### Docker & Deployment
- `docker-compose.yml` - за локална разработка (с nginx)
- `docker-compose.prod.yml` - за production (без nginx)
- `Dockerfile` - PHP-FPM контейнер конфигурация
- `deploy.sh` - Пълен deployment скрипт
- `quick-deploy.sh` - Бърз deployment за ежедневни промени
- `DEPLOYMENT.md` - Пълна deployment документация
- `SERVER_SETUP.md` - Първоначална настройка на сървъра

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

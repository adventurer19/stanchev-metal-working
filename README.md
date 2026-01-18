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

### Единствена команда:

```bash
# Локално: Commit и push
git add .
git commit -m "Your changes"
git push origin main

# Production: SSH и deploy
ssh ubuntu@ip-172-31-16-63
cd /opt/projects/stanchev-metal-working
bash deploy.sh
```

**Това е всичко!** Скриптът прави всичко автоматично:
- Pull latest changes
- Clean old builds
- Fix permissions
- Install dependencies
- Build assets
- Optimize Laravel
- Restart containers

### Troubleshooting

Ако има permission denied:
```bash
sudo chown -R ubuntu:ubuntu /opt/projects/stanchev-metal-working
bash deploy.sh
```

### 📚 Documentation

- **[DEPLOYMENT.md](DEPLOYMENT.md)** - Complete deployment guide
- **[EMAIL_SETUP_COMPLETE.md](EMAIL_SETUP_COMPLETE.md)** - Email system docs
- **[TEST_EMAIL.md](TEST_EMAIL.md)** - Email testing

**Production URL**: https://stanchevisin.com

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

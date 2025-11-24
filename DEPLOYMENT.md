# Инструкции за разгръщане на Railway

## Стъпка 1: Регистрация в Railway
1. Отиди на https://railway.app
2. Регистрирай се с GitHub акаунта
3. Railway ще ти даде $5 кредит месечно (безплатно)

## Стъпка 2: Създаване на нов проект
1. Натисни "New Project"
2. Избери "Deploy from GitHub repo"
3. Избери репозитория `adventurer19/stanchev-metal-working`

## Стъпка 3: Настройка на средата
Railway автоматично ще разпознае Laravel проекта. Трябва да добавиш следните environment variables:

### Backend Service (Laravel):
```
APP_NAME=Metalworking
APP_ENV=production
APP_KEY=base64:... (генерирай с: php artisan key:generate)
APP_DEBUG=false
APP_URL=https://your-app-name.up.railway.app

DB_CONNECTION=mysql
DB_HOST=containers-us-west-xxx.railway.app
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=... (от Railway database service)

LOG_CHANNEL=stack
```

### Database Service:
1. Добави нов MySQL service в Railway
2. Railway автоматично ще създаде променливите за базата данни
3. Копирай ги в Laravel service environment variables

## Стъпка 4: Build команди
Railway автоматично ще изпълни:
- `composer install --no-dev --optimize-autoloader`
- `php artisan migrate --force`
- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan view:cache`

## Стъпка 5: Public директория
В настройките на service-а, задай:
- **Root Directory**: `/`
- **Public Directory**: `public`

## Стъпка 6: Custom Domain (опционално)
Railway ти дава безплатен поддомейн, но можеш да добавиш и собствен домейн.

---

# Алтернатива: Render.com

## Стъпка 1: Регистрация
1. Отиди на https://render.com
2. Регистрирай се с GitHub

## Стъпка 2: Нов Web Service
1. "New +" → "Web Service"
2. Свържи GitHub репозитория
3. Избери `adventurer19/stanchev-metal-working`

## Стъпка 3: Настройки
- **Name**: metalworking-website
- **Environment**: PHP
- **Build Command**: `composer install --no-dev --optimize-autoloader && php artisan config:cache && php artisan route:cache && php artisan view:cache`
- **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`
- **Root Directory**: (празно)

## Стъпка 4: Environment Variables
Добави същите променливи като в Railway.

## Стъпка 5: Database
1. "New +" → "PostgreSQL" или "MySQL"
2. Свържи го с Web Service-а
3. Обнови DB_CONNECTION и други DB променливи

---

# Важни бележки:
- `.env` файлът НЕ трябва да се качва в GitHub (вече е в .gitignore)
- Винаги използвай environment variables в хостинга
- APP_KEY трябва да се генерира на хостинга или да се копира от локалния проект
- Storage директорията може да се нуждае от `php artisan storage:link`


# =========================
# MAIL CONFIGURATION - Инструкции
# =========================

## ОПЦИЯ 1: Gmail SMTP (Препоръчително за real production)
## ----------------------------------------------------
## 1. Отиди в Google Account Settings: https://myaccount.google.com/security
## 2. Включи "2-Step Verification"
## 3. Генерирай "App Password" за Mail
## 4. Използвай тези настройки в .env:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Станчев и Син 2025 ЕООД"


## ОПЦИЯ 2: ABV.BG SMTP (Понеже имейлът ви е @abv.bg)
## ----------------------------------------------------
## Препоръчвам да използваш този, защото имейлът е stanchev_sin2025@abv.bg

MAIL_MAILER=smtp
MAIL_HOST=smtp.abv.bg
MAIL_PORT=465
MAIL_USERNAME=stanchev_sin2025@abv.bg
MAIL_PASSWORD=your-abv-password-here
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=stanchev_sin2025@abv.bg
MAIL_FROM_NAME="Станчев и Син 2025 ЕООД"


## ОПЦИЯ 3: Mailtrap (За testing - не изпраща реални имейли)
## ----------------------------------------------------
## 1. Регистрирай се на https://mailtrap.io (безплатно)
## 2. Създай inbox и копирай credentials
## 3. Използвай тези настройки:

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@stanchevisin.com"
MAIL_FROM_NAME="Станчев и Син 2025 ЕООД"


## ОПЦИЯ 4: За локален development - само log (текущата настройка)
## ----------------------------------------------------
MAIL_MAILER=log
MAIL_FROM_ADDRESS="no-reply@stanchevisin.com"
MAIL_FROM_NAME="Станчев и Син 2025 ЕООД"


# =========================
# ИНСТРУКЦИИ ЗА РЕДАКТИРАНЕ НА .env
# =========================

## 1. Отвори .env файла:
##    nano /Users/nikolay/shami/metalworking/.env
##    или
##    vim /Users/nikolay/shami/metalworking/.env

## 2. Намери секцията MAIL CONFIGURATION (около ред 35-40)

## 3. Замени текущите настройки с една от опциите по-горе

## 4. Запази файла

## 5. Restart Docker контейнерите:
##    docker compose down && docker compose up -d

## 6. Провери дали работи:
##    docker compose exec app php artisan tinker
##    >> Mail::raw('Test email', function($msg) { $msg->to('test@example.com')->subject('Test'); });


# =========================
# ВАЖНИ ЗАБЕЛЕЖКИ
# =========================

## - За production ВИНАГИ използвай РЕАЛНИ SMTP настройки (Gmail, ABV.BG, SendGrid, etc)
## - НЕ commit-вай .env файла в Git (той е в .gitignore)
## - За ABV.BG вероятно ще трябва да провериш дали позволяват SMTP достъп в настройките на акаунта
## - Gmail изисква "App Password", не обикновената парола
## - За production среда препоръчвам професионални услуги като SendGrid или Mailgun

#!/bin/bash

# Script за конфигуриране на mail настройките за контактната форма
# Използвай: bash setup-mail.sh

echo "🚀 Mail Configuration Setup за Станчев и Син 2025 ЕООД"
echo "========================================================"
echo ""
echo "Моля, избери mail provider:"
echo ""
echo "1) ABV.BG SMTP (Препоръчително - вашият имейл е @abv.bg)"
echo "2) Gmail SMTP"
echo "3) Mailtrap (Testing only - не изпраща реални имейли)"
echo "4) Log only (само записва в log файлове)"
echo ""
read -p "Избери опция (1-4): " choice

case $choice in
  1)
    echo ""
    echo "📧 Конфигурация за ABV.BG SMTP"
    echo "--------------------------------"
    read -p "ABV.BG Имейл (например: stanchev_sin2025@abv.bg): " abv_email
    read -sp "ABV.BG Парола: " abv_password
    echo ""
    
    # Обновяване на .env
    sed -i.bak "s|^MAIL_MAILER=.*|MAIL_MAILER=smtp|" .env
    sed -i.bak "s|^MAIL_HOST=.*|MAIL_HOST=smtp.abv.bg|" .env
    sed -i.bak "s|^MAIL_PORT=.*|MAIL_PORT=465|" .env
    sed -i.bak "s|^MAIL_USERNAME=.*|MAIL_USERNAME=$abv_email|" .env
    sed -i.bak "s|^MAIL_PASSWORD=.*|MAIL_PASSWORD=$abv_password|" .env
    sed -i.bak "s|^MAIL_ENCRYPTION=.*|MAIL_ENCRYPTION=ssl|" .env
    sed -i.bak "s|^MAIL_FROM_ADDRESS=.*|MAIL_FROM_ADDRESS=$abv_email|" .env
    
    # Добави настройки ако не съществуват
    if ! grep -q "MAIL_USERNAME" .env; then
      echo "" >> .env
      echo "MAIL_USERNAME=$abv_email" >> .env
      echo "MAIL_PASSWORD=$abv_password" >> .env
      echo "MAIL_ENCRYPTION=ssl" >> .env
    fi
    
    echo "✅ ABV.BG SMTP конфигурацията е завършена!"
    ;;
    
  2)
    echo ""
    echo "📧 Конфигурация за Gmail SMTP"
    echo "--------------------------------"
    echo "⚠️  ВАЖНО: Трябва да генерираш App Password в Gmail:"
    echo "   1. Отиди на https://myaccount.google.com/security"
    echo "   2. Включи '2-Step Verification'"
    echo "   3. Генерирай 'App Password' за Mail"
    echo ""
    read -p "Gmail адрес: " gmail_email
    read -sp "Gmail App Password (16 символа): " gmail_password
    echo ""
    
    sed -i.bak "s|^MAIL_MAILER=.*|MAIL_MAILER=smtp|" .env
    sed -i.bak "s|^MAIL_HOST=.*|MAIL_HOST=smtp.gmail.com|" .env
    sed -i.bak "s|^MAIL_PORT=.*|MAIL_PORT=587|" .env
    sed -i.bak "s|^MAIL_USERNAME=.*|MAIL_USERNAME=$gmail_email|" .env
    sed -i.bak "s|^MAIL_PASSWORD=.*|MAIL_PASSWORD=$gmail_password|" .env
    sed -i.bak "s|^MAIL_ENCRYPTION=.*|MAIL_ENCRYPTION=tls|" .env
    sed -i.bak "s|^MAIL_FROM_ADDRESS=.*|MAIL_FROM_ADDRESS=$gmail_email|" .env
    
    if ! grep -q "MAIL_USERNAME" .env; then
      echo "" >> .env
      echo "MAIL_USERNAME=$gmail_email" >> .env
      echo "MAIL_PASSWORD=$gmail_password" >> .env
      echo "MAIL_ENCRYPTION=tls" >> .env
    fi
    
    echo "✅ Gmail SMTP конфигурацията е завършена!"
    ;;
    
  3)
    echo ""
    echo "📧 Конфигурация за Mailtrap"
    echo "--------------------------------"
    echo "⚠️  Регистрирай се на https://mailtrap.io и копирай credentials"
    echo ""
    read -p "Mailtrap Username: " mailtrap_user
    read -sp "Mailtrap Password: " mailtrap_pass
    echo ""
    
    sed -i.bak "s|^MAIL_MAILER=.*|MAIL_MAILER=smtp|" .env
    sed -i.bak "s|^MAIL_HOST=.*|MAIL_HOST=smtp.mailtrap.io|" .env
    sed -i.bak "s|^MAIL_PORT=.*|MAIL_PORT=2525|" .env
    sed -i.bak "s|^MAIL_USERNAME=.*|MAIL_USERNAME=$mailtrap_user|" .env
    sed -i.bak "s|^MAIL_PASSWORD=.*|MAIL_PASSWORD=$mailtrap_pass|" .env
    sed -i.bak "s|^MAIL_ENCRYPTION=.*|MAIL_ENCRYPTION=tls|" .env
    
    if ! grep -q "MAIL_USERNAME" .env; then
      echo "" >> .env
      echo "MAIL_USERNAME=$mailtrap_user" >> .env
      echo "MAIL_PASSWORD=$mailtrap_pass" >> .env
      echo "MAIL_ENCRYPTION=tls" >> .env
    fi
    
    echo "✅ Mailtrap конфигурацията е завършена!"
    ;;
    
  4)
    sed -i.bak "s|^MAIL_MAILER=.*|MAIL_MAILER=log|" .env
    echo "✅ Mail logging е активиран (имейлите ще се записват в storage/logs/)"
    ;;
    
  *)
    echo "❌ Невалиден избор!"
    exit 1
    ;;
esac

echo ""
echo "🔄 Restart на Docker контейнерите..."
docker compose down
docker compose up -d

echo ""
echo "✅ Готово! Контактната форма вече може да изпраща имейли!"
echo ""
echo "📝 За тестване:"
echo "   1. Отвори http://localhost:8080/contact"
echo "   2. Попълни и изпрати формата"
echo "   3. Провери имейла на: stanchev_sin2025@abv.bg"
echo ""

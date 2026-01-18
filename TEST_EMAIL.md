# 🧪 Тестване на Email Система

## Бърза Команда за Тестване

```bash
docker compose exec app php artisan mail:test
```

## Какво прави тази команда?

1. ✅ Показва текущата mail конфигурация
2. ✅ Изпраща красив HTML тестов имейл
3. ✅ Показва статус (успех/грешка)

## Пример:

```bash
$ docker compose exec app php artisan mail:test nezull02@abv.bg

🔍 Mail Configuration:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
| MAIL_MAILER       | smtp                    |
| MAIL_HOST         | smtp.abv.bg             |
| MAIL_PORT         | 465                     |
| MAIL_ENCRYPTION   | ssl                     |
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ Тестовият имейл е изпратен успешно!
📧 Проверете: nezull02@abv.bg
```

## Unit Tests

```bash
docker compose exec app ./vendor/bin/phpunit tests/Feature/ContactFormTest.php
```

**Резултат:** 9 tests, 24 assertions - всички минават ✅

## Още информация

Вижте `EMAIL_SETUP_COMPLETE.md` за пълна документация.

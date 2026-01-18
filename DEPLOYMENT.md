# 🚀 Production Deployment Guide

## Единствена команда за deploy:

```bash
bash deploy.sh
```

Това е всичко! Скриптът прави всичко автоматично:
- ✅ Спира контейнерите
- ✅ Изчиства старите build файлове
- ✅ Pull-ва последните промени от GitHub
- ✅ Fix-ва всички permissions
- ✅ Стартира контейнерите
- ✅ Инсталира dependencies (composer + npm)
- ✅ Build-ва assets
- ✅ Optimize-ва Laravel
- ✅ Рестартира контейнерите

## 📋 Complete Deployment Process

### На Local Machine:

```bash
# Commit и push промените
git add .
git commit -m "Your changes"
git push origin main
```

### На Production Server:

```bash
# SSH към сървъра
ssh ubuntu@ip-172-31-16-63

# Go to project
cd /opt/projects/stanchev-metal-working

# Deploy
bash deploy.sh
```

**Готово!** 🎉

## 🔍 Verify Deployment

След deploy, проверете:

```bash
# Website
curl https://stanchevisin.com

# Logs
docker compose -f docker-compose.prod.yml logs -f stanchev-app

# Container status
docker compose -f docker-compose.prod.yml ps
```

В браузъра:
- ✅ Отворете https://stanchevisin.com
- ✅ Hard refresh: `Ctrl+Shift+R` (Windows) или `Cmd+Shift+R` (Mac)
- ✅ Проверете всички страници
- ✅ Тествайте контактната форма

## 🛠️ Troubleshooting

### Ако deploy.sh не може да се изпълни:

```bash
# Make it executable
chmod +x deploy.sh
bash deploy.sh
```

### Ако има permission denied грешки:

```bash
# Fix ownership първо
sudo chown -R ubuntu:ubuntu /opt/projects/stanchev-metal-working
bash deploy.sh
```

### Ако контейнерите не стартират:

```bash
# Проверете логовете
docker compose -f docker-compose.prod.yml logs

# Проверете дисковото пространство
df -h

# Рестартирайте Docker
sudo systemctl restart docker
bash deploy.sh
```

### Ако сайтът не се обновява:

1. **Hard refresh в браузъра**: `Ctrl+Shift+R`
2. **Изчистете browser cache**
3. **Проверете дали build-а е успешен** в логовете на deploy.sh

## 📝 Deployment Checklist

- [ ] Local: Промените са committed и pushed
- [ ] Server: SSH connected
- [ ] Server: `cd /opt/projects/stanchev-metal-working`
- [ ] Server: `bash deploy.sh`
- [ ] Server: Няма грешки в output-а
- [ ] Browser: Open https://stanchevisin.com
- [ ] Browser: Hard refresh (`Ctrl+Shift+R`)
- [ ] Browser: Всички страници работят
- [ ] Browser: Contact form работи

## 💡 Tips

1. **Винаги проверявайте output-а** на deploy.sh за грешки
2. **Hard refresh браузъра** след deploy
3. **Тествайте contact form** след deploy
4. **Monitor логовете** първите 5 минути: `docker compose -f docker-compose.prod.yml logs -f`

## 🔐 За .env файла

⚠️ **Важно:** `.env` файлът на production е различен от local!

Production `.env` съдържа:
```env
APP_ENV=production
APP_DEBUG=false
MAIL_USERNAME=stanchev_sin2025@abv.bg
MAIL_PASSWORD=реалната-парола
COMPANY_EMAIL="stanchev_sin2025@abv.bg"
# ... други production настройки
```

`.env` файлът **НЕ СЕ OVERWRITE-ва** при deploy - той остава непроменен.

## 📚 Related Documentation

- `README.md` - Main project documentation
- `EMAIL_SETUP_COMPLETE.md` - Email system setup
- `TEST_EMAIL.md` - Email testing guide

---

**Production URL**: https://stanchevisin.com

**Created:** 2026-01-18  
**Updated:** 2026-01-18  
**Project:** Станчев и Син 2025 ЕООД

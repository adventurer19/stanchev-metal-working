# 🚀 Deployment Guide - Fix Permission Issues

## ❌ Проблемът

При deploy на production сървъра, `git checkout .` и `git pull` дават **Permission Denied** грешки:

```
error: unable to unlink old 'bootstrap/cache/packages.php': Permission denied
error: unable to create file storage/framework/sessions/...: Permission denied
```

**Причина:**
- Laravel файловете са owned от `www-data` (Docker контейнера)
- Git операциите се изпълняват от `ubuntu` user
- `ubuntu` няма permissions да променя `www-data` файловете

## ✅ Решение

### Вариант 1: Бърз Fix (Преди Git операции)

Ако искате само да направите `git checkout .` или `git pull`:

```bash
# На production сървъра
cd /opt/projects/stanchev-metal-working

# Fix permissions
sudo bash fix-permissions-pre-deploy.sh

# Сега можете да правите git операции
git checkout .
git pull origin main
```

### Вариант 2: Използвайте Обновения deploy.sh

Обновеният `deploy.sh` автоматично fix-ва permissions ПРЕДИ git операции:

```bash
# На production сървъра
cd /opt/projects/stanchev-metal-working
bash deploy.sh
```

**Какво прави новият deploy.sh:**
1. ✅ Fix-ва permissions ПРЕДИ git pull
2. ✅ Прави git pull
3. ✅ Fix-ва permissions за Laravel директориите
4. ✅ Build-ва assets
5. ✅ Optimize-ва Laravel
6. ✅ Restart-ва контейнерите

## 🔧 Manual Permission Fix

Ако искате да fix-нете permissions ръчно:

```bash
cd /opt/projects/stanchev-metal-working

# 1. Make ubuntu owner of everything for git operations
sudo chown -R ubuntu:ubuntu .

# 2. Now git operations will work
git pull origin main
git checkout .

# 3. After git operations, fix Laravel permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# 4. Make sure ubuntu owns git directory
sudo chown -R ubuntu:ubuntu .git
```

## 📋 Пълен Deployment Process

### Стъпка 1: Local Changes

На вашия локален компютър:

```bash
# Commit и push промените
git add .
git commit -m "Your changes"
git push origin main
```

### Стъпка 2: Deploy на Production

На production сървъра:

```bash
# SSH към сървъра
ssh ubuntu@your-server-ip

# Навигирай до проекта
cd /opt/projects/stanchev-metal-working

# Използвай deploy скрипта
bash deploy.sh

# Или с rebuild на контейнерите (ако има промени в Dockerfile)
bash deploy.sh --rebuild
```

### Стъпка 3: Verify

```bash
# Провери логовете
docker compose -f docker-compose.prod.yml logs -f stanchev-app

# Провери сайта
curl https://stanchevisin.com

# Или отвори в браузъра
# https://stanchevisin.com
```

## 🛠️ Troubleshooting

### Проблем: Permission Denied при git операции

**Решение:**
```bash
sudo chown -R ubuntu:ubuntu /opt/projects/stanchev-metal-working
git pull origin main
```

### Проблем: Failed to open stream vendor/composer (Corrupted vendor/)

**Грешка:**
```
Failed to open stream: No such file or directory in vendor/composer/autoload_real.php
```

**Причина:** `vendor/` директорията е повредена или непълна.

**Решение 1 (Бърз Fix):**
```bash
bash emergency-fix-vendor.sh
```

**Решение 2 (Ръчно):**
```bash
# Remove corrupted vendor
sudo rm -rf vendor/

# Reinstall dependencies
docker compose -f docker-compose.prod.yml exec stanchev-app composer install --no-dev --optimize-autoloader

# Fix permissions
sudo chown -R www-data:www-data vendor/
```

### Проблем: Laravel не може да пише в storage/

**Решение:**
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### Проблем: npm run build fails

**Решение:**
```bash
# Влез в контейнера
docker compose -f docker-compose.prod.yml exec stanchev-app bash

# Install dependencies
npm install

# Build
npm run build

# Exit
exit
```

### Проблем: CSS/JS не се update-ват

**Решение:**
```bash
# Clear Laravel cache
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan cache:clear
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan view:clear
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan config:clear

# Rebuild assets
docker compose -f docker-compose.prod.yml exec stanchev-app npm run build

# Hard refresh в браузъра: Ctrl+Shift+R (Windows) или Cmd+Shift+R (Mac)
```

## 📝 Deployment Checklist

- [ ] Local: Commit и push промените
- [ ] Server: `cd /opt/projects/stanchev-metal-working`
- [ ] Server: `bash deploy.sh`
- [ ] Server: Провери логовете
- [ ] Browser: Отвори https://stanchevisin.com
- [ ] Browser: Hard refresh (Ctrl+Shift+R)
- [ ] Browser: Провери промените

## 🔐 Important Notes

### Permissions Structure

```
/opt/projects/stanchev-metal-working/
├── .git/              ← ubuntu:ubuntu (за git операции)
├── storage/           ← www-data:www-data 775 (Laravel пише тук)
├── bootstrap/cache/   ← www-data:www-data 775 (Laravel пише тук)
├── public/build/      ← www-data:www-data (build artifacts)
├── vendor/            ← www-data:www-data (composer)
├── node_modules/      ← www-data:www-data (npm)
└── (други файлове)    ← ubuntu:ubuntu (source code)
```

### За Production:

1. **Винаги използвайте `deploy.sh`** - той fix-ва permissions автоматично
2. **Не правете ръчно git operations** без да fix-нете permissions първо
3. **Проверявайте логовете** след deploy: `docker compose -f docker-compose.prod.yml logs -f`

### За .env файла:

⚠️ **Внимание:** `.env` файлът на production е различен от local!

Production `.env` трябва да съдържа:
```env
APP_ENV=production
APP_DEBUG=false
MAIL_USERNAME=stanchev_sin2025@abv.bg
MAIL_PASSWORD=реалната-парола
COMPANY_EMAIL="stanchev_sin2025@abv.bg"
# ... други production настройки
```

## 🚨 Emergency Fixes

Ако нещо се счупи напълно:

```bash
# 1. Stop контейнерите
docker compose -f docker-compose.prod.yml down

# 2. Fix всички permissions
sudo chown -R ubuntu:ubuntu /opt/projects/stanchev-metal-working
sudo chown -R www-data:www-data /opt/projects/stanchev-metal-working/storage
sudo chown -R www-data:www-data /opt/projects/stanchev-metal-working/bootstrap/cache
sudo chmod -R 775 /opt/projects/stanchev-metal-working/storage
sudo chmod -R 775 /opt/projects/stanchev-metal-working/bootstrap/cache

# 3. Reset git repo
cd /opt/projects/stanchev-metal-working
git reset --hard origin/main
git clean -fd

# 4. Rebuild всичко
bash deploy.sh --rebuild
```

---

## 📞 Къде да търсите помощ

1. **Логове:**
   ```bash
   docker compose -f docker-compose.prod.yml logs -f stanchev-app
   tail -f storage/logs/laravel.log
   ```

2. **Container status:**
   ```bash
   docker compose -f docker-compose.prod.yml ps
   ```

3. **Disk space:**
   ```bash
   df -h
   ```

---

**Създадено:** 2026-01-18  
**Автор:** AI Assistant  
**Проект:** Станчев и Син 2025 ЕООД

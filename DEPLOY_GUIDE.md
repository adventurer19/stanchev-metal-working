# 🚀 Production Deploy - Complete Guide

## 🚨 Current Issue: Corrupted vendor/ directory

### What happened:
```
Failed to open stream: No such file or directory in vendor/composer/autoload_real.php
```

### Quick Fix (На production сървъра):

```bash
# 1. SSH към сървъра
ssh ubuntu@ip-172-31-16-63

# 2. Go to project
cd /opt/projects/stanchev-metal-working

# 3. Run emergency fix
bash emergency-fix-vendor.sh

# 4. Deploy normally
bash deploy.sh
```

---

## 📋 Complete Deployment Steps

### На Local Machine:

```bash
# 1. Commit changes
git add .
git commit -m "Your changes"

# 2. Push to GitHub
git push origin main
```

### На Production Server:

```bash
# 1. SSH
ssh ubuntu@ip-172-31-16-63

# 2. Navigate to project
cd /opt/projects/stanchev-metal-working

# 3. Deploy
bash deploy.sh

# 4. Verify
curl https://stanchevisin.com
```

---

## 🛠️ New Deploy Script Features

Обновеният `deploy.sh` сега автоматично:

1. ✅ **Fix permissions** преди git pull
2. ✅ **Git pull** от main branch
3. ✅ **Auto-rebuild** контейнерите ако Dockerfile се промени
4. ✅ **Composer install** - инсталира PHP dependencies
5. ✅ **NPM ci** - инсталира JS dependencies
6. ✅ **Build assets** - компилира CSS/JS
7. ✅ **Optimize Laravel** - cache routes, config, views
8. ✅ **Fix permissions** след deploy
9. ✅ **Restart app** контейнера

---

## 🚨 Emergency Fixes

### 1. Corrupted vendor/

```bash
bash emergency-fix-vendor.sh
```

### 2. Permission denied

```bash
sudo chown -R ubuntu:ubuntu /opt/projects/stanchev-metal-working
bash deploy.sh
```

### 3. Total reset

```bash
cd /opt/projects/stanchev-metal-working
docker compose -f docker-compose.prod.yml down
sudo rm -rf vendor/ node_modules/ public/build/
bash deploy.sh --rebuild
```

---

## 📝 Available Scripts

### `deploy.sh`
Main deployment script - use this for normal deploys
```bash
bash deploy.sh
```

### `deploy.sh --rebuild`
Deploy with full Docker rebuild
```bash
bash deploy.sh --rebuild
```

### `emergency-fix-vendor.sh`
Fix corrupted vendor/ directory
```bash
bash emergency-fix-vendor.sh
```

### `fix-permissions-pre-deploy.sh`
Fix permissions before manual git operations
```bash
sudo bash fix-permissions-pre-deploy.sh
git checkout .
```

---

## 🔍 Verify Deployment

```bash
# Check container status
docker compose -f docker-compose.prod.yml ps

# Check logs
docker compose -f docker-compose.prod.yml logs -f stanchev-app

# Test website
curl https://stanchevisin.com

# Check Laravel
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan --version
```

---

## 📊 Deployment Checklist

- [ ] Local: Changes committed and pushed
- [ ] Server: SSH connected
- [ ] Server: In project directory
- [ ] Server: Run `bash deploy.sh`
- [ ] Server: Check logs (no errors)
- [ ] Browser: Open https://stanchevisin.com
- [ ] Browser: Hard refresh (Ctrl+Shift+R)
- [ ] Browser: Test contact form
- [ ] Browser: Check all pages load

---

## 💡 Tips

1. **Always use `deploy.sh`** - it handles everything automatically
2. **Check logs** after deploy: `docker compose -f docker-compose.prod.yml logs -f`
3. **Hard refresh browser** after deploy: `Ctrl+Shift+R` (Windows) or `Cmd+Shift+R` (Mac)
4. **Test contact form** with real email after deploy
5. **Monitor first 5 minutes** after deploy for errors

---

## 📞 Common Issues

| Issue | Solution |
|-------|----------|
| Permission denied | `sudo chown -R ubuntu:ubuntu .` |
| Corrupted vendor/ | `bash emergency-fix-vendor.sh` |
| Assets not updating | `docker compose -f docker-compose.prod.yml exec stanchev-app npm run build` |
| Laravel errors | `docker compose -f docker-compose.prod.yml logs -f stanchev-app` |
| CSS/JS not loading | Hard refresh browser `Ctrl+Shift+R` |

---

## 📚 Documentation Files

- `DEPLOYMENT_PERMISSIONS.md` - Complete permissions guide
- `QUICK_FIX_PERMISSIONS.md` - Quick reference
- `EMAIL_SETUP_COMPLETE.md` - Email system docs
- `COMPANY_CONFIG.md` - Company config docs (was deleted, can recreate if needed)

---

**Created:** 2026-01-18  
**Author:** AI Assistant  
**Project:** Станчев и Син 2025 ЕООД

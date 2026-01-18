# 🚨 Quick Fixes для Production

## 1. Permission Denied Error

Ако видите **Permission Denied** грешки при `git checkout .` или `git pull`:

### Бързо Решение:

```bash
# Fix permissions
sudo chown -R ubuntu:ubuntu /opt/projects/stanchev-metal-working

# Сега git работи
git checkout .
# или
git pull origin main
```

## 2. Corrupted vendor/ Error

Ако видите грешка:
```
Failed to open stream: No such file or directory in vendor/composer/autoload_real.php
```

### Бързо Решение:

```bash
# На production сървъра
cd /opt/projects/stanchev-metal-working
bash emergency-fix-vendor.sh
```

## 3. Normal Deploy

След като fix-нете грешките, използвайте:

```bash
bash deploy.sh
```

---

За повече информация: виж `DEPLOYMENT_PERMISSIONS.md`

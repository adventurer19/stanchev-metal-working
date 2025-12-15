# Deployment

## 🚀 Как да деплойваш

### Обикновен deploy (код, CSS, templates)
```bash
# 1. Локално - commit промените
git add .
git commit -m "Промени"
git push origin main

# 2. Deploy
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash deploy.sh"
```

### Deploy с rebuild (промени в Dockerfile или docker-compose)
```bash
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash deploy.sh --rebuild"
```

**Готово!** Толкова е просто.

---

## 🔥 Ако нещо се обърка

### 500 Server Error
```bash
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  sudo chown -R www-data:www-data storage bootstrap/cache && \
  sudo chmod -R 775 storage bootstrap/cache && \
  docker compose -f docker-compose.prod.yml restart stanchev-app"
```

### CSS не се зарежда
```bash
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  sudo chown -R www-data:www-data public/build node_modules && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build && \
  docker compose -f docker-compose.prod.yml restart stanchev-app"
```

### Всичко е счупено (Nuclear option)
```bash
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
docker compose -f docker-compose.prod.yml down
rm -rf vendor node_modules bootstrap/cache/*.php
bash deploy.sh
```

---

## 📝 Логове

```bash
# Виж какво се случва
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  docker compose -f docker-compose.prod.yml logs -f stanchev-app"
```

---

## 🔄 Rollback

```bash
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git log --oneline -5  # виж commits
git reset --hard <commit-hash>
bash deploy.sh
```

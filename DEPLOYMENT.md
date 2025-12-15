# Deployment Workflow

## 🚀 Как да деплойваш промени на production

### Стандартен workflow (за повечето промени)

#### 1. Локална разработка
```bash
# Стартирай локалния dev environment
docker-compose up -d
npm run dev

# Прави промените си
# Тествай локално на http://localhost:8080
```

#### 2. Commit и push към GitHub
```bash
git add .
git commit -m "Описание на промените"
git push origin main
```

#### 3. Deploy на production сървъра

**Опция А: Бърз deploy (само код промени, без нови зависимости)**
```bash
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  git pull origin main && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan config:cache && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan route:cache && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan view:cache"
```

**Опция Б: Пълен deploy (с нови зависимости или промени в конфигурация)**
```bash
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && bash deploy.sh"
```

---

## 📋 Различни сценарии

### Сценарий 1: Промени само в Blade templates или CSS
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git pull origin main
docker compose -f docker-compose.prod.yml exec stanchev-app npm run build
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan view:cache
```

### Сценарий 2: Промени в PHP код (Controllers, Models, Routes)
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git pull origin main
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan config:cache
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan route:cache
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan view:cache
```

### Сценарий 3: Нови Composer зависимости
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git pull origin main
docker compose -f docker-compose.prod.yml exec stanchev-app composer install --no-dev --optimize-autoloader
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan config:cache
```

### Сценарий 4: Нови NPM зависимости
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git pull origin main
docker compose -f docker-compose.prod.yml exec stanchev-app npm install
docker compose -f docker-compose.prod.yml exec stanchev-app npm run build
```

### Сценарий 5: Database migrations
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git pull origin main
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan migrate --force
```

### Сценарий 6: Промени в .env файл
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
nano .env  # Редактирай .env файла
docker compose -f docker-compose.prod.yml exec stanchev-app php artisan config:cache
docker compose -f docker-compose.prod.yml restart stanchev-app
```

### Сценарий 7: Промени в Dockerfile или docker-compose.prod.yml
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working
git pull origin main
docker compose -f docker-compose.prod.yml down
docker compose -f docker-compose.prod.yml build --no-cache
docker compose -f docker-compose.prod.yml up -d
# След това инсталирай зависимости отново (виж deploy.sh)
```

### Сценарий 8: Промени в nginx конфигурация
```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/nginx-container
# Редактирай nginx/conf.d/sites/stanchevisin.com.conf
docker compose exec nginx nginx -t  # Тествай конфигурацията
docker compose restart nginx
```

---

## 🔧 Полезни команди

### Проверка на статус
```bash
# Статус на контейнерите
ssh maire-atelier "docker ps | grep stanchev"

# Логове
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  docker compose -f docker-compose.prod.yml logs -f stanchev-app"

# Проверка на nginx логове
ssh maire-atelier "cd /opt/projects/nginx-container && \
  docker compose logs -f nginx"
```

### Debugging
```bash
# Влез в контейнера
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  docker compose -f docker-compose.prod.yml exec stanchev-app bash"

# Изчисти кеша
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  docker compose -f docker-compose.prod.yml exec stanchev-app php artisan cache:clear && \
  docker compose -f docker-compose.prod.yml exec stanchev-app php artisan config:clear && \
  docker compose -f docker-compose.prod.yml exec stanchev-app php artisan route:clear && \
  docker compose -f docker-compose.prod.yml exec stanchev-app php artisan view:clear"
```

### Рестартиране
```bash
# Рестартирай само app контейнера
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  docker compose -f docker-compose.prod.yml restart stanchev-app"

# Рестартирай всички контейнери
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  docker compose -f docker-compose.prod.yml restart"

# Рестартирай nginx
ssh maire-atelier "cd /opt/projects/nginx-container && \
  docker compose restart nginx"
```

---

## 📝 Препоръчителен workflow (Best Practices)

### За ежедневна разработка:

1. **Локално**: Прави промените и тествай
2. **Commit**: `git add . && git commit -m "Описание"`
3. **Push**: `git push origin main`
4. **Deploy**: Използвай бързия deploy команда (Опция А)

### За по-големи промени:

1. **Локално**: Тествай всичко внимателно
2. **Commit**: Commit-вай промените
3. **Push**: Push към GitHub
4. **Backup**: (Опционално) Backup на базата данни
5. **Deploy**: Използвай пълния deploy скрипт (Опция Б)
6. **Тест**: Провери сайта на https://stanchevisin.com
7. **Rollback**: Ако нещо не работи, rollback с `git revert`

---

## 🎯 Бърза справка (Quick Reference)

```bash
# Най-често използвана команда за deploy:
ssh maire-atelier "cd /opt/projects/stanchev-metal-working && \
  git pull && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build && \
  docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize"

# Или още по-кратко (създай alias):
alias deploy-stanchev='ssh maire-atelier "cd /opt/projects/stanchev-metal-working && git pull && docker compose -f docker-compose.prod.yml exec -T stanchev-app npm run build && docker compose -f docker-compose.prod.yml exec -T stanchev-app php artisan optimize"'

# След това просто:
deploy-stanchev
```

---

## ⚠️ Важни забележки

1. **Винаги тествай локално** преди да деплойваш
2. **Не редактирай файлове директно на сървъра** - използвай git workflow
3. **За production промени в .env** - редактирай директно на сървъра, но не ги commit-вай
4. **Backup базата данни** преди големи промени
5. **Проверявай логовете** след deploy за грешки

---

## 🔄 Rollback (ако нещо се обърка)

```bash
# На сървъра
ssh maire-atelier
cd /opt/projects/stanchev-metal-working

# Виж последните commits
git log --oneline -5

# Rollback към предишен commit
git reset --hard <commit-hash>

# Rebuild и restart
docker compose -f docker-compose.prod.yml restart stanchev-app
```


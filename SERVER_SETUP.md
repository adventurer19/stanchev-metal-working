# Бърза настройка на сървъра

## Стъпка 1: Добави volume в maire-atelier nginx контейнер

Редактирай `/opt/projects/maire-atelier/docker-compose.yml`:

Намери `nginx-prod` service и добави volume (разкоментирай или добави реда):

```yaml
nginx-prod:
  image: nginx:1.25-alpine
  container_name: maire-nginx-prod
  depends_on:
    - backend-prod
    - frontend-prod
  volumes:
    - ./docker/nginx/nginx.conf:/etc/nginx/nginx.conf:ro
    - ./docker/nginx/conf.d/app-multi-ssl.conf:/etc/nginx/conf.d/default.conf:ro
    # Maire-atelier volumes
    - ./backend/public:/var/www/html/public:ro
    # Stanchev-metal-working volumes
    - ../stanchev-metal-working/public:/var/www/stanchev/public:ro  # РАЗКОМЕНТИРАЙ ТОВА
    # SSL certificates
    - /etc/letsencrypt:/etc/letsencrypt:ro
    - /var/www/certbot:/var/www/certbot:ro
  ports:
    - "80:80"
    - "443:443"
  profiles: [prod-sim]
  networks: [app]
```

**Важно**: Пътят трябва да сочи към `public` директорията, не към root на проекта!

След това рестартирай nginx:
```bash
cd /opt/projects/maire-atelier
docker-compose --profile prod-sim restart nginx-prod
```

## Стъпка 2: Добави nginx конфигурация

Отвори `/opt/projects/maire-atelier/app-multi-ssl.conf` и добави:

### 1. Upstream (в началото, след другите upstreams):

```nginx
upstream stanchev_php_backend {
    server stanchev-metalworking-app:9000;
}
```

### 2. Server блокове (в края на файла):

Копирай всичко от `docker/nginx/production.conf` файла (HTTP и HTTPS server блоковете).

## Стъпка 3: Проверка на мрежата

Провери името на мрежата в maire-atelier:

```bash
cd /opt/projects/maire-atelier
grep -A 2 "networks:" docker-compose.yml
```

Ако мрежата НЕ се казва `maire-network`, редактирай `docker-compose.prod.yml` в stanchev проекта и промени:

```yaml
networks:
  maire-network:  # Промени тук според реалното име
    external: true
```

## Стъпка 4: Рестартиране

```bash
# Рестартирай nginx
cd /opt/projects/maire-atelier
docker-compose --profile prod-sim restart nginx-prod

# Проверка на конфигурацията
docker-compose --profile prod-sim exec nginx-prod nginx -t
```

## Стъпка 5: Стартиране на stanchev контейнерите

```bash
cd /opt/projects/stanchev-metal-working
docker-compose -f docker-compose.prod.yml up -d
```

## Проверка

```bash
# Проверка на контейнерите
docker ps | grep stanchev

# Проверка на логове
cd /opt/projects/stanchev-metal-working
docker-compose -f docker-compose.prod.yml logs -f app
```


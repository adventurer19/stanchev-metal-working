# Поправка на Firewall/Security Group проблем

## Проблем: ERR_CONNECTION_TIMED_OUT

Контейнерите работят, но не можеш да се свържеш отвън. Това е firewall/Security Group проблем.

## Решение 1: Проверка на порта на сървъра

```bash
# Проверка дали nginx слуша на порт 8080
sudo netstat -tlnp | grep 8080
# или
sudo ss -tlnp | grep 8080

# Проверка на Docker портовете
docker compose -f docker-compose.prod.yml ps
```

## Решение 2: Отвори порт 8080 в Ubuntu Firewall

```bash
# Проверка на firewall статуса
sudo ufw status

# Отвори порт 8080
sudo ufw allow 8080/tcp

# Проверка отново
sudo ufw status
```

## Решение 3: AWS Security Group (най-важно!)

Трябва да отвориш порт 8080 в AWS Security Group:

1. Отиди в AWS Console → EC2 → Security Groups
2. Намери Security Group-а на твоя сървър
3. Добави Inbound Rule:
   - Type: Custom TCP
   - Port: 8080
   - Source: 0.0.0.0/0 (или твоя IP за по-голяма сигурност)
   - Description: Metalworking website

## Решение 4: Тест локално на сървъра

```bash
# Тест от сървъра
curl http://localhost:8080
# или
curl http://172.31.16.63:8080
```

Ако работи локално, проблемът е в Security Group.

## Решение 5: Проверка на nginx конфигурацията

```bash
# Проверка на nginx конфигурацията
docker exec -it metalworking-nginx cat /etc/nginx/conf.d/default.conf

# Тест на nginx конфигурацията
docker exec -it metalworking-nginx nginx -t
```




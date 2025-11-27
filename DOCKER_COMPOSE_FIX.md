# Решение: docker-compose не е намерен

## Проблем
`docker-compose` командата не е налична на сървъра.

## Решение 1: Използвай `docker compose` (новата версия)

Новата версия на Docker използва `docker compose` (с интервал) вместо `docker-compose`:

```bash
# Опитай с новата версия
docker compose -f docker-compose.prod.yml up -d --build
```

## Решение 2: Инсталирай docker-compose (ако Решение 1 не работи)

```bash
# Инсталирай docker-compose
sudo apt update
sudo apt install docker-compose -y

# След това използвай
docker-compose -f docker-compose.prod.yml up -d --build
```

## Решение 3: Проверка на Docker версията

```bash
# Проверка на Docker версията
docker --version
docker compose version

# Ако docker compose работи, използвай:
docker compose -f docker-compose.prod.yml up -d --build
```

## След като стартираш контейнерите:

```bash
# Проверка на статуса (с новата версия)
docker compose -f docker-compose.prod.yml ps

# Или (със старата версия)
docker-compose -f docker-compose.prod.yml ps
```




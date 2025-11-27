# Решение на проблем с правата за достъп

## Проблем: Permission denied при git clone

Ако получиш грешка `Permission denied` при клониране в `/opt/projects`, ето решенията:

### Решение 1: Използвай home директорията (препоръчително)

```bash
cd ~
mkdir -p projects
cd projects
git clone git@github.com-personal:adventurer19/stanchev-metal-working.git metalworking
cd metalworking
```

### Решение 2: Поправи правата на /opt/projects

```bash
# Проверка на текущите права
ls -la /opt/projects

# Ако директорията не съществува или е с root права:
sudo mkdir -p /opt/projects
sudo chown -R ubuntu:ubuntu /opt/projects
sudo chmod -R 755 /opt/projects

# След това клонирай
cd /opt/projects
git clone git@github.com-personal:adventurer19/stanchev-metal-working.git metalworking
```

### Решение 3: Клонирай с sudo (не препоръчително, но работи)

```bash
sudo git clone git@github.com-personal:adventurer19/stanchev-metal-working.git /opt/projects/metalworking
sudo chown -R ubuntu:ubuntu /opt/projects/metalworking
cd /opt/projects/metalworking
```

## Препоръка

Използвай **Решение 1** - клонирай в `~/projects/` защото:
- Няма проблеми с правата
- По-лесно за управление
- Стандартна практика за user проекти




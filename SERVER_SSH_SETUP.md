# Настройка на SSH за GitHub на сървъра

## Проблем: Could not resolve hostname github.com-personal

На сървъра няма SSH конфигурация за `github.com-personal`. Ето как да го поправиш:

## Решение 1: Добави SSH конфигурация на сървъра (препоръчително)

```bash
# 1. Създай/редактирай SSH config файла
nano ~/.ssh/config

# 2. Добави следното:
Host github.com-personal
    HostName github.com
    User git
    IdentityFile ~/.ssh/git_hub_personal
    IdentitiesOnly yes

# 3. Проверка на SSH ключа
ls -la ~/.ssh/git_hub_personal

# Ако няма ключ, трябва да го копираш от локалната машина или да създадеш нов
```

## Решение 2: Използвай стандартния GitHub URL

```bash
# Клонирай с HTTPS (ще иска username/password или token)
git clone https://github.com/adventurer19/stanchev-metal-working.git metalworking

# Или ако имаш SSH ключ на сървъра:
git clone git@github.com:adventurer19/stanchev-metal-working.git metalworking
```

## Решение 3: Копирай SSH ключа от локалната машина

На локалната машина:
```bash
# Проверка на ключа
cat ~/.ssh/git_hub_personal.pub

# Копирай публичния ключ
```

На сървъра:
```bash
# Създай директорията ако няма
mkdir -p ~/.ssh
chmod 700 ~/.ssh

# Създай/редактирай authorized_keys или добави ключа
nano ~/.ssh/git_hub_personal
# Вмъкни частния ключ тук
chmod 600 ~/.ssh/git_hub_personal

# Създай config файла
nano ~/.ssh/config
# Добави конфигурацията от Решение 1
chmod 600 ~/.ssh/config
```

## Решение 4: Използвай HTTPS с Personal Access Token

```bash
# 1. Създай Personal Access Token в GitHub:
# Settings → Developer settings → Personal access tokens → Tokens (classic)
# Дай права: repo

# 2. Клонирай с token:
git clone https://YOUR_TOKEN@github.com/adventurer19/stanchev-metal-working.git metalworking

# Или ще попита за username (твоя GitHub username) и password (token-а)
```

## Препоръка

Използвай **Решение 1** ако вече имаш SSH ключ, или **Решение 4** (HTTPS с token) за най-бързо решение.


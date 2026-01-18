#!/usr/bin/env sh
set -e

cd /var/www/html

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache

# (по желание) ако имаш проблеми с права на някои хостове, махни USER www-data и прави chown тук като root.
# В този вариант runtime е www-data, така че няма chown.

php artisan package:discover --ansi || true
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# (по желание) миграции - много хора НЕ ги пускат автоматично
# php artisan migrate --force

exec "$@"

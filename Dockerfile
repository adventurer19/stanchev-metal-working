# ---------- PHP deps (vendor) ----------
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
  --no-dev \
  --no-interaction \
  --no-progress \
  --prefer-dist \
  --optimize-autoloader \
  --no-scripts

# ---------- Frontend build (Vite) ----------
FROM node:20-alpine AS frontend
WORKDIR /app

COPY package.json package-lock.json* ./
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi

COPY vite.config.js postcss.config.js tailwind.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm run build \
 && rm -rf node_modules


# ---------- Runtime (PHP-FPM only) ----------
FROM php:8.4-fpm AS runtime
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY . .

COPY --from=vendor /app/vendor /var/www/html/vendor
COPY --from=frontend /app/public/build /var/www/html/public/build

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache \
  && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000
USER www-data
ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]

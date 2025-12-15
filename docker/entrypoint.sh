#!/bin/bash
set -e

echo "🚀 Starting application setup..."

# Install/update Composer dependencies
if [ ! -d "vendor" ] || [ ! -f "vendor/autoload.php" ]; then
  echo "📦 Installing Composer dependencies..."
  composer install --no-dev --optimize-autoloader --no-interaction
else
  echo "📦 Updating Composer dependencies..."
  composer install --no-dev --optimize-autoloader --no-interaction
fi

# Install npm dependencies (check if package.json exists)
if [ -f "package.json" ]; then
  if [ ! -d "node_modules" ] || [ "package.json" -nt "node_modules" ]; then
    echo "📦 Installing npm dependencies..."
    npm install
  else
    echo "📦 npm dependencies already installed"
  fi

  # Build assets
  echo "🔨 Building assets..."
  npm run build
else
  echo "⚠️  package.json not found, skipping npm install"
fi

# Laravel setup commands
echo "⚙️  Running Laravel setup..."

# Generate app key if not exists (only if .env exists and APP_KEY is empty)
if [ -f ".env" ]; then
  if grep -q "APP_KEY=$" .env || ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force || true
  fi
fi

# Cache configuration (only if .env exists)
if [ -f ".env" ]; then
  echo "💾 Caching configuration..."
  php artisan config:cache || true

  echo "🛣️  Caching routes..."
  php artisan route:cache || true

  echo "👁️  Caching views..."
  php artisan view:cache || true
fi

# Run migrations (only if needed - you can comment this if you want manual control)
# echo "🗄️  Running migrations..."
# php artisan migrate --force

echo "✅ Setup complete! Starting PHP-FPM..."

# Start PHP-FPM
exec php-fpm


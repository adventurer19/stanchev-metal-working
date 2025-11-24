#!/bin/bash

echo "🔧 Поправка на SetLocale middleware проблема..."

cd /opt/projects/metalworking

echo ""
echo "1️⃣  Актуализиране на кода..."
git pull

echo ""
echo "2️⃣  Проверка дали SetLocale.php съществува..."
if [ -f "app/Http/Middleware/SetLocale.php" ]; then
    echo "   ✅ Файлът съществува"
    cat app/Http/Middleware/SetLocale.php
else
    echo "   ❌ Файлът не съществува! Създавам го..."
    mkdir -p app/Http/Middleware
    cat > app/Http/Middleware/SetLocale.php << 'EOF'
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('locale', 'bg');
        
        if (in_array($locale, ['bg', 'en'])) {
            App::setLocale($locale);
        }
        
        return $next($request);
    }
}
EOF
fi

echo ""
echo "3️⃣  Регенериране на autoload..."
docker exec -it metalworking-app composer dump-autoload

echo ""
echo "4️⃣  Изчистване на кеша..."
docker exec -it metalworking-app php artisan config:clear
docker exec -it metalworking-app php artisan route:clear
docker exec -it metalworking-app php artisan view:clear

echo ""
echo "5️⃣  Кеширане на конфигурацията..."
docker exec -it metalworking-app php artisan config:cache
docker exec -it metalworking-app php artisan route:cache
docker exec -it metalworking-app php artisan view:cache

echo ""
echo "6️⃣  Рестартиране на контейнерите..."
docker compose -f docker-compose.prod.yml restart

echo ""
echo "✅ Готово! Проверка на сайта:"
echo "   http://172.31.16.63:8080"


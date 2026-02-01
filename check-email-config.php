<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📧 Contact Form Email Configuration\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

echo "Environment Variables:\n";
$companyEmailEnv = env('COMPANY_EMAIL');
$mailUsername = env('MAIL_USERNAME');
$mailPassword = env('MAIL_PASSWORD');
echo "  COMPANY_EMAIL:  " . ($companyEmailEnv ?: '❌ NOT SET') . "\n";
echo "  MAIL_USERNAME:  " . ($mailUsername ?: '❌ NOT SET') . "\n";
echo "  MAIL_PASSWORD:  " . ($mailPassword ? '✅ SET' : '❌ NOT SET') . "\n\n";

echo "Configuration Values:\n";
$companyEmail = config('app.company.email');
echo "  Company Email (получател):  " . $companyEmail . "\n\n";

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "ℹ️  Контактната форма ще изпраща имейли до: " . $companyEmail . "\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

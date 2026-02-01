<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\ContactSubmission;

// ========================================
// ADMIN ROUTES
// ========================================

// Admin login page
Route::get('/admin', function () {
    // If already authenticated, redirect to dashboard
    if (Session::get('admin_authenticated')) {
        return redirect()->route('admin.dashboard');
    }
    return view('admin.login');
})->name('admin.login');

// Admin login submit
Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $username = $request->input('username');
    $password = $request->input('password');

    // Check credentials from .env
    if ($username === env('ADMIN_USER') && $password === env('ADMIN_PASS')) {
        Session::put('admin_authenticated', true);
        Session::put('admin_username', $username);
        return redirect()->route('admin.dashboard')->with('success', 'Успешно влязохте в системата!');
    }

    return back()->withErrors(['username' => 'Невалидно потребителско име или парола.'])->withInput();
})->name('admin.login.submit');

// Admin logout
Route::post('/admin/logout', function () {
    Session::forget('admin_authenticated');
    Session::forget('admin_username');
    return redirect()->route('admin.login')->with('success', 'Излязохте от системата.');
})->name('admin.logout');

// Admin dashboard - protected
Route::get('/admin/dashboard', function (\Illuminate\Http\Request $request) {
    $filter = $request->query('filter');
    
    $query = ContactSubmission::orderBy('created_at', 'desc');
    
    if ($filter === 'unread') {
        $query->where('is_read', false);
    } elseif ($filter === 'read') {
        $query->where('is_read', true);
    }
    
    $submissions = $query->paginate(20);
    $total = ContactSubmission::count();
    $unread = ContactSubmission::where('is_read', false)->count();
    $read = ContactSubmission::where('is_read', true)->count();
    
    return view('admin.dashboard', compact('submissions', 'total', 'unread', 'read'));
})->middleware('admin.auth')->name('admin.dashboard');

// View submission detail
Route::get('/admin/submission/{id}', function ($id) {
    $submission = ContactSubmission::findOrFail($id);
    return view('admin.submission', compact('submission'));
})->middleware('admin.auth')->name('admin.submission.view');

// Mark submission as read
Route::post('/admin/submission/{id}/mark-read', function ($id) {
    $submission = ContactSubmission::findOrFail($id);
    $submission->markAsRead();
    return back()->with('success', 'Запитването е маркирано като прочетено.');
})->middleware('admin.auth')->name('admin.submission.mark-read');

// Delete submission
Route::delete('/admin/submission/{id}', function ($id) {
    $submission = ContactSubmission::findOrFail($id);
    $submission->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Запитването е изтрито успешно.');
})->middleware('admin.auth')->name('admin.submission.delete');

// ========================================
// PUBLIC ROUTES
// ========================================

Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, ['bg', 'en'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('locale');

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// About page (combines About and Portfolio)
Route::get('/about', function () {
    // Get products from image-products directory
    $productsDir = public_path('image-products');
    $products = [];
    
    if (is_dir($productsDir)) {
        $dirs = array_filter(glob($productsDir . '/*'), 'is_dir');
        
        foreach ($dirs as $dir) {
            $productName = basename($dir);
            // GLOB_BRACE is not available in PHP 8.0+, so we use multiple glob patterns
            $images = array_merge(
                glob($dir . '/*.jpg'),
                glob($dir . '/*.jpeg'),
                glob($dir . '/*.png'),
                glob($dir . '/*.heic'),
                glob($dir . '/*.JPG'),
                glob($dir . '/*.JPEG'),
                glob($dir . '/*.PNG'),
                glob($dir . '/*.HEIC')
            );
            
            if (!empty($images)) {
                // Get first image as thumbnail
                $thumbnail = str_replace(public_path(), '', $images[0]);
                $thumbnail = ltrim($thumbnail, '/');
                
                $products[] = [
                    'slug' => $productName,
                    'name' => ucfirst(str_replace('-', ' ', $productName)),
                    'thumbnail' => $thumbnail,
                    'imageCount' => count($images),
                    'images' => array_map(function($img) {
                        return ltrim(str_replace(public_path(), '', $img), '/');
                    }, $images)
                ];
            }
        }
    }
    
    return view('about', ['products' => $products]);
})->name('about');

// Redirect /portfolio to /about for backwards compatibility
Route::get('/portfolio', function () {
    return redirect()->route('about');
})->name('portfolio');

// Why Us page
Route::get('/why-us', function () {
    return view('why-us');
})->name('why-us');

// Contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Contact form submission with rate limiting (max 5 attempts per minute)
// Dynamic Sitemap - автоматично работи за локално и production
Route::get('/sitemap.xml', function (\Illuminate\Http\Request $request) {
    // Използваме request()->getSchemeAndHttpHost() за динамичен base URL
    $baseUrl = $request->getSchemeAndHttpHost();
    $lastmod = now()->format('Y-m-d');
    
    $urls = [
        ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => '/why-us', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => '/contact', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ];
    
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
    $xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
    
    foreach ($urls as $url) {
        $xml .= '    <url>' . "\n";
        $xml .= '        <loc>' . rtrim($baseUrl, '/') . $url['loc'] . '</loc>' . "\n";
        $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
        $xml .= '        <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
        $xml .= '        <priority>' . $url['priority'] . '</priority>' . "\n";
        $xml .= '        <xhtml:link rel="alternate" hreflang="bg" href="' . rtrim($baseUrl, '/') . $url['loc'] . '?locale=bg"/>' . "\n";
        $xml .= '        <xhtml:link rel="alternate" hreflang="en" href="' . rtrim($baseUrl, '/') . $url['loc'] . '?locale=en"/>' . "\n";
        $xml .= '    </url>' . "\n";
    }
    
    $xml .= '</urlset>';
    
    return response($xml, 200)->header('Content-Type', 'text/xml');
})->name('sitemap');

// Dynamic robots.txt
Route::get('/robots.txt', function (\Illuminate\Http\Request $request) {
    // Използваме request()->getSchemeAndHttpHost() за динамичен base URL
    $baseUrl = $request->getSchemeAndHttpHost();
    
    $content = "User-agent: *\n";
    $content .= "Allow: /\n";
    $content .= "Disallow: /admin/\n";
    $content .= "Disallow: /api/\n\n";
    $content .= "Sitemap: " . rtrim($baseUrl, '/') . "/sitemap.xml\n";
    
    return response($content, 200)->header('Content-Type', 'text/plain');
})->name('robots');

// Favicon redirect to avoid 404
Route::get('/favicon.ico', function () {
    return redirect('/favicon-optimized.svg', 301);
})->name('favicon');

// Contact form submission with rate limiting (max 5 attempts per minute)
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $locale = app()->getLocale();
    
    // Security: Check for honeypot field (hidden field that bots will fill)
    if ($request->filled('website')) {
        // If honeypot field is filled, it's likely a bot - silently reject and log
        Log::warning('Honeypot triggered - potential bot submission', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'honeypot_value' => $request->website,
        ]);
        return redirect()->route('contact')->with('success', __('Съобщението е изпратено успешно!'));
    }
    
    $messages = [
        'bg' => [
            'name.required' => 'Полето Име е задължително.',
            'name.min' => 'Името трябва да съдържа поне 2 знака.',
            'name.max' => 'Името не може да бъде повече от 255 знака.',
            'name.regex' => 'Името може да съдържа само букви, интервали, тире и апостроф.',
            'email.required' => 'Полето Имейл е задължително.',
            'email.email' => 'Моля, въведете валиден имейл адрес (напр. example@domain.com).',
            'email.max' => 'Имейлът не може да бъде повече от 255 знака.',
            'phone.min' => 'Телефонният номер трябва да съдържа поне 6 цифри.',
            'phone.max' => 'Телефонът не може да бъде повече от 20 знака.',
            'phone.regex' => 'Моля, въведете валиден телефонен номер (напр. +359 888 123 456).',
            'message.required' => 'Полето Съобщение е задължително.',
            'message.min' => 'Съобщението трябва да съдържа поне 10 знака.',
            'message.max' => 'Съобщението не може да бъде повече от 2000 знака.',
        ],
        'en' => [
            'name.required' => 'The Name field is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.regex' => 'The name may only contain letters, spaces, hyphens and apostrophes.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'Please enter a valid email address (e.g. example@domain.com).',
            'email.max' => 'The email may not be greater than 255 characters.',
            'phone.min' => 'The phone number must contain at least 6 digits.',
            'phone.max' => 'The phone may not be greater than 20 characters.',
            'phone.regex' => 'Please enter a valid phone number (e.g. +359 888 123 456).',
            'message.required' => 'The Message field is required.',
            'message.min' => 'The message must contain at least 10 characters.',
            'message.max' => 'The message may not be greater than 2000 characters.',
        ]
    ];
    
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'min:2', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
        'email' => ['required', 'email:rfc,dns', 'max:255'],
        'phone' => ['nullable', 'string', 'min:6', 'max:20', 'regex:/^[\d\s\+\-\(\)]+$/'],
        'message' => ['required', 'string', 'min:10', 'max:2000'],
    ], $messages[$locale] ?? $messages['bg']);

    if ($validator->fails()) {
        return redirect()->route('contact')
            ->withErrors($validator)
            ->withInput();
    }

    try {
        // Security: Sanitize input data to prevent XSS attacks
        $name = strip_tags($request->name);
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        $phone = strip_tags($request->phone);
        $messageContent = strip_tags($request->message);
        
        // Security: Additional validation - check for spam keywords
        $spamKeywords = ['viagra', 'casino', 'loan', 'bitcoin', 'crypto', 'investment'];
        $lowerMessage = strtolower($messageContent);
        foreach ($spamKeywords as $keyword) {
            if (strpos($lowerMessage, $keyword) !== false) {
                // Log spam attempt
                Log::warning('Spam keyword detected in contact form', [
                    'ip' => $request->ip(),
                    'keyword' => $keyword,
                    'email' => $email,
                ]);
                // Silently reject spam
                return redirect()->route('contact')->with('success', __('Съобщението е изпратено успешно!'));
            }
        }
        
        // Security: Check for suspicious patterns (URLs in name field)
        if (preg_match('/(http|www\.|\.com|\.net|\.org)/i', $name)) {
            Log::warning('Suspicious pattern detected in name field', [
                'ip' => $request->ip(),
                'name' => $name,
            ]);
            return redirect()->route('contact')
                ->with('error', __('Невалидни данни. Моля, опитайте отново.'));
        }
        
        // Save to database instead of sending email
        ContactSubmission::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $messageContent,
            'ip_address' => $request->ip(),
            'is_read' => false,
        ]);

        // Log successful submission
        Log::info('Contact form submitted successfully', [
            'name' => $name,
            'email' => $email,
            'ip' => $request->ip(),
        ]);

        return redirect()->route('contact')->with('success', __('Съобщението е изпратено успешно!'));
    } catch (\Exception $e) {
        // Log the error with details
        Log::error('Contact form submission failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'ip' => $request->ip(),
            'email' => $request->email ?? 'unknown',
        ]);
        
        // In development, show the actual error for debugging
        if (config('app.debug')) {
            return redirect()->route('contact')
                ->with('error', __('Възникна грешка при изпращането') . ': ' . $e->getMessage())
                ->withInput();
        }
        
        return redirect()->route('contact')
            ->with('error', __('Възникна грешка при изпращането. Моля, опитайте отново.'))
            ->withInput();
    }
})->name('contact.submit')->middleware('throttle:5,1'); // Max 5 submissions per minute



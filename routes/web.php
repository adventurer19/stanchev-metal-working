<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            $images = glob($dir . '/*.{jpg,jpeg,png,heic,JPG,JPEG,PNG,HEIC}', GLOB_BRACE);
            
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
    
    return view('portfolio', ['products' => $products]);
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

// Contact form submission
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    if ($validator->fails()) {
        return redirect()->route('contact')
            ->withErrors($validator)
            ->withInput();
    }

    try {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? __('Не е посочен'),
            'message' => $request->message,
        ];

        // Изпращане на имейл
        Mail::raw(
            __('Ново съобщение от контактната форма') . "\n\n" .
            __('Име') . ": {$data['name']}\n" .
            __('Имейл') . ": {$data['email']}\n" .
            __('Телефон') . ": {$data['phone']}\n\n" .
            __('Съобщение') . ":\n{$data['message']}",
            function ($message) use ($data) {
                $message->to('stanchev_sin2025@abv.bg')
                    ->subject(__('Ново съобщение от') . ' ' . $data['name'])
                    ->replyTo($data['email'], $data['name']);
            }
        );

        return redirect()->route('contact')->with('success', __('Съобщението е изпратено успешно!'));
    } catch (\Exception $e) {
        return redirect()->route('contact')
            ->with('error', __('Възникна грешка при изпращането. Моля, опитайте отново.'));
    }
})->name('contact.submit');


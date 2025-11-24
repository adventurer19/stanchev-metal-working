<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Portfolio page
Route::get('/portfolio', function () {
    return view('portfolio');
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
    // TODO: Implement email sending
    return redirect()->route('contact')->with('success', __('Съобщението е изпратено успешно!'));
})->name('contact.submit');


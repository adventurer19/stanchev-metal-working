@extends('layouts.app')

@section('title', __('Контакти - Станчев и Син 2025 ЕООД'))

@section('content')
<!-- Hero Section -->
<section class="relative py-32 bg-slate-950 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
        <img src="{{ asset('metalworking-images/contact-us-img.jpg') }}" alt="{{ __('Контакти') }}" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-radial"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h1 class="section-title">
                {{ __('Свържете се с нас') }}
            </h1>
            <p class="section-subtitle">
                {{ __('Готови сте да направите следващата стъпка? Нашият екип е тук, за да отговори на вашите нужди.') }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="card">
                <h2 class="text-3xl font-bold text-white mb-8">{{ __('Изпратете ни съобщение') }}</h2>
                @if(session('success'))
                    <div class="mb-6 p-4 bg-accent-500/20 border border-accent-500/50 rounded-sm text-accent-400">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-sm text-red-400">
                        {{ session('error') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-sm text-red-400">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Име') }}</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                               class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-sm text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Имейл') }}</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                               class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-sm text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Телефон') }}</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" 
                               class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-sm text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Съобщение') }}</label>
                        <textarea id="message" name="message" rows="5" required 
                                  class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-sm text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300 resize-none">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full btn-primary" disabled>
                        {{ __('Изпрати съобщение') }}
                    </button>
                </form>
            </div>
            <div class="space-y-8">
                <div class="card">
                    <h3 class="text-2xl font-bold text-white mb-8">{{ __('Контактна информация') }}</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-accent-500/20 rounded-sm flex items-center justify-center flex-shrink-0">
                                <svg class="w-7 h-7 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-slate-300 font-semibold mb-1">{{ __('Адрес') }}</p>
                                <p class="text-slate-400">{{ __('Болтата, бул. „Столетов" 162') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-accent-500/20 rounded-sm flex items-center justify-center flex-shrink-0">
                                <svg class="w-7 h-7 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-slate-300 font-semibold mb-1">{{ __('Телефон') }}</p>
                                <a href="tel:+35977855070" class="text-accent-400 hover:text-accent-300 transition-colors duration-300">+359 77855070</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-accent-500/20 rounded-sm flex items-center justify-center flex-shrink-0">
                                <svg class="w-7 h-7 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-slate-300 font-semibold mb-1">{{ __('Имейл') }}</p>
                                <a href="mailto:stanchev_sin2025@abv.bg" class="text-accent-400 hover:text-accent-300 transition-colors duration-300">stanchev_sin2025@abv.bg</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-2xl font-bold text-white mb-4">{{ __('Работно време') }}</h3>
                    <div class="space-y-2 text-slate-400">
                        <p class="flex justify-between">
                            <span>{{ __('Понеделник - Петък') }}</span>
                            <span>08:00 - 17:00</span>
                        </p>
                        <p class="flex justify-between">
                            <span>{{ __('Събота') }}</span>
                            <span>{{ __('Почивен ден') }}</span>
                        </p>
                        <p class="flex justify-between">
                            <span>{{ __('Неделя') }}</span>
                            <span>{{ __('Почивен ден') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="mt-16">
            <div class="card p-0 overflow-hidden">
                <div class="p-6 border-b border-slate-800">
                    <h3 class="text-2xl font-bold text-white mb-2">{{ __('Нашето местоположение') }}</h3>
                    <p class="text-slate-400">{{ __('Болтата, бул. „Столетов" 162, Габрово') }}</p>
                </div>
                <div class="relative w-full h-96 rounded-b-sm overflow-hidden bg-slate-800 group">
                    <!-- Google Maps iframe -->
                    <iframe 
                        src="https://www.google.com/maps?q=Болтата,+бул.+Столетов+162,+Габрово,+България&output=embed&hl={{ app()->getLocale() === 'bg' ? 'bg' : 'en' }}&zoom=15"
                        width="100%" 
                        height="100%" 
                        style="border:0; filter: grayscale(30%) brightness(0.8) contrast(1.2);" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                    <div class="absolute inset-0 pointer-events-none border border-slate-800/50 rounded-b-sm"></div>
                    <!-- Hover overlay with link -->
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-b-sm">
                        <a href="https://www.google.com/maps/search/?api=1&query=Болтата,+бул.+Столетов+162,+Габрово,+България" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="btn-primary">
                            {{ __('Отвори в Google Maps') }}
                        </a>
                    </div>
                </div>
                <div class="p-6 border-t border-slate-800">
                    <a href="https://www.google.com/maps/search/?api=1&query=Столетов+162,+Габрово,+България" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center text-accent-400 hover:text-accent-300 transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        {{ __('Отвори в Google Maps') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


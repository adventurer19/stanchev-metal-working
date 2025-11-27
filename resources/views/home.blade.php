@extends('layouts.app')

@section('title', __('Начало - Станчев и Син 2025 ЕООД'))

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
        <img src="{{ asset('metalworking-images/metal-working-premium.png') }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-radial"></div>
    </div>
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto animate-fade-in">
        <div class="inline-flex items-center gap-3 mb-6 px-8 py-4 bg-gradient-to-r from-amber-500/25 via-amber-500/20 to-amber-500/25 backdrop-blur-md border-2 border-amber-400/70 rounded-sm shadow-2xl shadow-amber-500/40 ring-2 ring-amber-500/20">
            <svg class="w-6 h-6 text-amber-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-lg md:text-xl font-bold text-amber-100 tracking-wide drop-shadow-lg">{{ __('15+ години опит в индустрията') }}</span>
        </div>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold mb-6 text-white leading-tight">
            <span class="block mb-2 tracking-tight">{{ __('Металообработка') }}</span>
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-accent-400 via-accent-500 to-accent-600 drop-shadow-2xl">{{ __('с премиум качество') }}</span>
        </h1>
        <div class="mb-12 max-w-4xl mx-auto space-y-4">
            <p class="text-xl md:text-2xl text-slate-200 leading-relaxed font-medium">
                {{ __('Специализирани сме в производството на прецизни метални детайли и компоненти за различни индустрии.') }}
            </p>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                {{ __('Използваме модерно оборудване и дългогодишен опит, за да създадем решения, които отговарят на най-строгите изисквания за качество и прецизност.') }}
            </p>
            <p class="text-lg md:text-xl text-slate-200 leading-relaxed font-normal tracking-normal">
                {{ __('Работим с клиенти от машиностроенето, автомобилната промишленост, военната индустрия и други, предлагайки персонализирани услуги по лазерно рязане, CNC обработка, стругова обработка и много други.') }}
            </p>
        </div>
        <div class="flex justify-center items-center">
            <a href="{{ route('about') }}#products" class="btn-primary">
                {{ __('Виж проектите') }}
            </a>
        </div>
    </div>
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- What We Do Section -->
<section class="py-32 bg-slate-950 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 class="section-title">
                {{ __('Какво правим') }}
            </h2>
            <p class="section-subtitle">
                {{ __('Предлагаме широк спектър от металообработващи услуги с високо качество и прецизност') }}
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 z-0 opacity-40 group-hover:opacity-60 transition-opacity">
                    <img src="{{ asset('metalworking-images/photo-1676646693434-8ee684e8ba49.avif') }}" alt="{{ __('CNC обработка') }}" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 z-[1] bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-slate-950/30 group-hover:from-slate-950/95 group-hover:via-slate-950/60 group-hover:to-slate-950/30 transition-colors"></div>
                <div class="absolute inset-0 border-2 border-accent-500/20 group-hover:border-accent-500/50 transition-all duration-500 rounded-sm z-20 pointer-events-none"></div>
                <div class="relative z-10 flex flex-col">
                    <div class="w-16 h-16 bg-slate-900/90 backdrop-blur-sm border border-accent-500/30 rounded-sm flex items-center justify-center mb-6 shadow-lg shadow-black/50">
                        <svg class="w-8 h-8 text-accent-400 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">{{ __('Фрезова изработка') }}</h3>
                    <p class="text-slate-200 leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)]">
                        {{ __('Прецизна изработка на метални детайли по индивидуални проекти.') }}
                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 z-0 opacity-40 group-hover:opacity-60 transition-opacity">
                    <img src="{{ asset('images-crafting/IMG_3659.jpeg') }}" alt="{{ __('Нишкова обработка') }}" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 z-[1] bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-slate-950/30 group-hover:from-slate-950/95 group-hover:via-slate-950/60 group-hover:to-slate-950/30 transition-colors"></div>
                <div class="absolute inset-0 border-2 border-accent-500/20 group-hover:border-accent-500/50 transition-all duration-500 rounded-sm z-20 pointer-events-none"></div>
                <div class="relative z-10 flex flex-col">
                    <div class="w-16 h-16 bg-slate-900/90 backdrop-blur-sm border border-accent-500/30 rounded-sm flex items-center justify-center mb-6 shadow-lg shadow-black/50">
                        <svg class="w-8 h-8 text-accent-400 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">{{ __('Нишкова обработка') }}</h3>
                    <p class="text-slate-200 leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)]">
                        {{ __('Специализирана нишкова обработка на метални компоненти.') }}
                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 z-0 opacity-40 group-hover:opacity-60 transition-opacity">
                    <img src="{{ asset('images-crafting/IMG_3660.jpg') }}" alt="{{ __('Обемна ерозийна обработка') }}" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 z-[1] bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-slate-950/30 group-hover:from-slate-950/95 group-hover:via-slate-950/60 group-hover:to-slate-950/30 transition-colors"></div>
                <div class="absolute inset-0 border-2 border-accent-500/20 group-hover:border-accent-500/50 transition-all duration-500 rounded-sm z-20 pointer-events-none"></div>
                <div class="relative z-10 flex flex-col">
                    <div class="w-16 h-16 bg-slate-900/90 backdrop-blur-sm border border-accent-500/30 rounded-sm flex items-center justify-center mb-6 shadow-lg shadow-black/50">
                        <svg class="w-8 h-8 text-accent-400 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">{{ __('Обемна ерозийна обработка') }}</h3>
                    <p class="text-slate-200 leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)]">
                        {{ __('Обемна ерозийна обработка за серийно производство.') }}
                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 z-0 opacity-40 group-hover:opacity-60 transition-opacity">
                    <img src="{{ asset('images-crafting/IMG_3661.jpg') }}" alt="{{ __('Стругова обработка') }}" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 z-[1] bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-slate-950/30 group-hover:from-slate-950/95 group-hover:via-slate-950/60 group-hover:to-slate-950/30 transition-colors"></div>
                <div class="absolute inset-0 border-2 border-accent-500/20 group-hover:border-accent-500/50 transition-all duration-500 rounded-sm z-20 pointer-events-none"></div>
                <div class="relative z-10 flex flex-col">
                    <div class="w-16 h-16 bg-slate-900/90 backdrop-blur-sm border border-accent-500/30 rounded-sm flex items-center justify-center mb-6 shadow-lg shadow-black/50">
                        <svg class="w-8 h-8 text-accent-400 drop-shadow-lg" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">{{ __('Стругова обработка') }}</h3>
                    <p class="text-slate-200 leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.6)]">
                        {{ __('Прецизна стругова обработка с модерни стругове за високо качество.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(59,130,246,0.08),transparent_70%)]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        {{ __('Започнете вашия проект с нас!') }}
                    </h2>
                    <div class="space-y-6">
                        <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                            {{ __('Готови сте да направите следващата стъпка? Нашият екип е тук, за да отговори на вашите нужди и да ви предложи иновативни решения.') }}
                        </p>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <div class="pt-4">
                    <a href="{{ route('contact') }}" class="btn-primary inline-flex items-center gap-3 group">
                        <span>{{ __('Свържете се с нас') }}</span>
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right Image -->
            <div class="relative">
                <div class="relative rounded-sm overflow-hidden border border-slate-800/50 shadow-2xl group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('metalworking-images/premium_photo-1664303560361-2b31c2d2c0ba.avif') }}" alt="{{ __('Започнете вашия проект с нас!') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -bottom-6 -right-6 w-40 h-40 bg-accent-500/10 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-accent-500/5 rounded-full blur-2xl opacity-40"></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission Section -->
<section class="py-32 bg-slate-950 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(59,130,246,0.08),transparent_70%)]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Image -->
            <div class="relative">
                <div class="relative rounded-sm overflow-hidden border border-slate-800/50 shadow-2xl group">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('metalworking-images/our-mission.png') }}" alt="{{ __('Нашата мисия') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -bottom-6 -left-6 w-40 h-40 bg-accent-500/10 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-accent-500/5 rounded-full blur-2xl opacity-40"></div>
            </div>
            
            <!-- Right Content -->
            <div class="space-y-8">
                <div>
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-accent-500/10 backdrop-blur-sm border border-accent-500/30 rounded-sm">
                        <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="text-sm font-semibold text-accent-300 tracking-wide">{{ __('Нашата мисия') }}</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                        {{ __('Мисия и цели') }}
                    </h2>
                    <div class="space-y-6">
                        <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                            {{ __('Нашата мисия е да предоставяме висококачествени продукти и услуги, които да подпомагат успеха на нашите клиенти както на национално, така и на международно ниво. Стремим се към постоянни иновации, подобряване на конкурентоспособността и дълготрайни партньорства.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="partners-section py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(59,130,246,0.08),transparent_70%)]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-accent-500/10 backdrop-blur-sm border border-accent-500/30 rounded-sm">
                <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-sm font-semibold text-accent-300 tracking-wide">{{ __('Доверени клиенти') }}</span>
            </div>
            <h2 class="section-title">
                {{ __('Доверени клиенти') }}
            </h2>
            <p class="section-subtitle">
                {{ __('Доверени партньори в различни индустрии') }}
            </p>
        </div>
        
        <!-- Partners Grid -->
        <div class="partners-grid-wrapper">
            @php
                $partners = [
                    [
                        'name' => 'Металик АД',
                        'description' => __('Стоманени конструкции и индустриално оборудване'),
                        'logo' => 'partner-logos/metalik-logo.png',
                        'website' => 'https://metalik.bg/bg'
                    ],
                    [
                        'name' => 'ЗГПУ Груп ООД',
                        'description' => __('Продукти за автоматизация и прецизни детайли'),
                        'logo' => 'partner-logos/zgpu-logo.jpg',
                        'website' => 'https://www.zgpu.com'
                    ],
                    [
                        'name' => 'Импулс АД',
                        'description' => __('Производство на редуктори и детайли'),
                        'logo' => 'partner-logos/impuls-logo.png',
                        'website' => 'https://www.impuls.bg/bg/'
                    ]
                ];
            @endphp
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach($partners as $index => $partner)
                    <div class="partner-card-static group">
                        <div class="partner-card-inner-static relative overflow-hidden h-full">
                            <!-- Background gradient effect -->
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-800/80 via-slate-800/60 to-slate-900/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute inset-0 border-2 border-accent-500/20 group-hover:border-accent-500/50 transition-all duration-500 rounded-sm"></div>
                            
                            <div class="partner-card-content-static relative z-10 h-full flex flex-col items-center justify-center text-center p-8">
                                <!-- Partner Logo -->
                                <div class="partner-logo-wrapper mb-6 group-hover:scale-105 transition-transform duration-300">
                                    @php
                                        $logoPath = public_path($partner['logo']);
                                        $logoExists = file_exists($logoPath) && filesize($logoPath) > 0;
                                    @endphp
                                    @if($logoExists)
                                        <img src="{{ asset($partner['logo']) }}" alt="{{ $partner['name'] }}" class="partner-logo">
                                    @else
                                        <!-- Fallback: Company name as text logo -->
                                        <div class="partner-text-logo">
                                            <div class="text-3xl font-bold text-accent-400 group-hover:text-accent-300 transition-colors duration-300">
                                                {{ strtoupper(mb_substr($partner['name'], 0, 1)) }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="partner-name-static text-2xl font-bold text-white mb-3 group-hover:text-accent-300 transition-colors duration-300">{{ $partner['name'] }}</h3>
                                <p class="partner-description-static text-base text-slate-400 group-hover:text-slate-300 transition-colors duration-300 leading-relaxed">{{ $partner['description'] }}</p>
                            </div>
                            
                            <!-- Shine effect on hover -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection


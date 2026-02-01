@extends('layouts.app')

@section('title', __('За нас | Прецизна металообработка | Станчев и Син 2025'))
@section('description', __('Запознайте се с нашия опит в металообработката. Специализирани услуги, модерно оборудване, портфолио с проекти и доверени партньори в България.'))
@section('keywords', __('за нас, портфолио металообработка, услуги заваряване, ЦНЦ машини, фирма за металообработка'))

@section('content')
    <!-- Hero Section -->
    <section class="relative py-32 bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
            <img src="{{ asset('metalworking-images/photo-1648815546048-6da4f0083a6d.avif') }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h1 class="section-title">
                    {{ __('Нашето майсторство') }}
                </h1>
                <p class="section-subtitle">
                    {{ __('Специализирани сме в прецизна металообработка, като предоставяме персонализирани услуги и продукти с високо качество и внимание към детайла.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- What We Offer Section -->
    <section class="py-24 md:py-32 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_30%,rgba(59,130,246,0.08),transparent_70%)]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16 md:mb-20">
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-accent-500/10 backdrop-blur-sm border border-accent-500/30 rounded-sm">
                    <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="text-sm font-semibold text-accent-300 tracking-wide">{{ __('Какво предлагаме') }}</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    {{ __('Какво предлагаме') }}
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-accent-500 to-accent-600 mx-auto"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 max-w-6xl mx-auto">
                <!-- Left Column - Services -->
                <div class="space-y-4">
                    @php
                        $services = [
                            ['icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'text' => __('3D моделиране на детайли и сглобки')],
                            ['icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'text' => __('Оптимизация и проверка на съществуващи 3D модели')],
                            ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'text' => __('Технически чертежи за производство')],
                            ['icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'text' => __('Конструиране и инженерно проектиране')],
                            ['icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z', 'text' => __('3D симулации при реални работни условия')]
                        ];
                    @endphp
                    @foreach($services as $service)
                        <div class="group card card-hover flex items-start gap-4 transition-all duration-300 hover:scale-[1.02]">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent-500/20 to-accent-600/20 rounded-sm flex items-center justify-center flex-shrink-0 group-hover:from-accent-500/30 group-hover:to-accent-600/30 transition-all duration-300">
                                <svg class="w-6 h-6 text-accent-400 group-hover:text-accent-300 transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $service['icon'] }}"></path>
                                </svg>
                            </div>
                            <div class="flex-1 pt-2">
                                <p class="text-slate-200 group-hover:text-white leading-relaxed transition-colors duration-300">
                                    {{ $service['text'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right Column - Why Choose Us -->
                <div class="space-y-6">
                    <div class="card bg-gradient-to-br from-slate-800/50 to-slate-900/50 border-accent-500/20 p-8">
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-8 flex items-center gap-3">
                            <svg class="w-8 h-8 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ __('Защо да изберете нас?') }}
                        </h3>

                        <div class="space-y-6">
                            @php
                                $benefits = [
                                    ['emoji' => '👷‍♂️', 'text' => __('25+ години професионален инженерен опит')],
                                    ['emoji' => '⚡', 'text' => __('Бърза комуникация и коректност')],
                                    ['emoji' => '🎯', 'text' => __('Индивидуален подход към всеки проект')]
                                ];
                            @endphp
                            @foreach($benefits as $benefit)
                                <div class="flex items-start gap-4 group">
                                    <div class="text-3xl flex-shrink-0 transform group-hover:scale-110 transition-transform duration-300">
{{--                                        {{ $benefit['emoji'] }}--}}
                                    </div>
                                    <p class="text-lg text-slate-300 group-hover:text-white leading-relaxed pt-1 transition-colors duration-300">
                                        {{ $benefit['text'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="py-16 sm:py-24 md:py-32 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left: Text Content -->
                <div class="space-y-4 sm:space-y-6">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 sm:mb-6">
                        {{ __('Прецизна металообработка и висококачествено производство') }}
                    </h2>
                    <div class="space-y-3 sm:space-y-4">
                        <p class="text-base sm:text-lg md:text-xl text-slate-300 leading-relaxed">
                            {{ __('Като семеен бизнес с дългогодишна традиция, ние се специализираме в изработката на метални компоненти и детайли, създадени по най-високи стандарти за качество, точност и надеждност. Нашият опит, ни позволява да изпълняваме дори най-строгите технически изисквания и спецификации в индустрията.') }}
                        </p>
                        <p class="text-base sm:text-lg md:text-xl text-slate-300 leading-relaxed">
                            {{ __('Нашата цел е да изграждаме дългосрочни партньорства, като предлагаме решения, които подпомагат развитието на бизнеса на нашите клиенти и отговарят изцяло на техните индивидуални нужди') }}
                        </p>
                    </div>
                </div>
                <!-- Right: Image -->
                <div class="relative">
                    <div class="relative rounded-sm overflow-hidden border border-slate-800/50 shadow-2xl group">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ asset('metalworking-images/precision-metal-working.png') }}" alt="{{ __('Прецизна металообработка и висококачествено производство') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="py-16 sm:py-24 md:py-32 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid md:grid-cols-3 gap-6 lg:gap-8 mb-12 sm:mb-16 md:mb-20">
                <div class="card card-hover">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-accent-500/20 rounded-sm flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ __('Прецизност и качество') }}</h3>
                            <p class="text-slate-400 leading-relaxed">
                                {{ __('Всеки детайл е изработен с внимание към перфектността. Използваме модерни технологии и строг контрол на качеството.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-hover">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-accent-500/20 rounded-sm flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ __('Иновации и технологии') }}</h3>
                            <p class="text-slate-400 leading-relaxed">
                                {{ __('Работим с най-модерните технологии и машини за най-добри резултати. Постоянно инвестираме в ново оборудване.') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-hover">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-accent-500/20 rounded-sm flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ __('Опитен екип') }}</h3>
                            <p class="text-slate-400 leading-relaxed">
                                {{ __('Нашият екип има дългогодишен опит в металообработката и отговаря на нуждите на клиенти от различни индустрии.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <div class="stat-card group text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-500/10 via-accent-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 border border-accent-500/20 rounded-sm group-hover:border-accent-500/40 transition-all duration-500"></div>
                    <div class="relative z-10 p-8 md:p-10">
                        <div class="stat-number mb-4">2025</div>
                        <p class="text-slate-300 font-medium text-base md:text-lg group-hover:text-slate-200 transition-colors duration-300">{{ __('Година основаване') }}</p>
                    </div>
                </div>
                <div class="stat-card group text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-500/10 via-accent-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 border border-accent-500/20 rounded-sm group-hover:border-accent-500/40 transition-all duration-500"></div>
                    <div class="relative z-10 p-8 md:p-10">
                        <div class="stat-number mb-4">100%</div>
                        <p class="text-slate-300 font-medium text-base md:text-lg group-hover:text-slate-200 transition-colors duration-300">{{ __('Прецизност') }}</p>
                    </div>
                </div>
                <div class="stat-card group text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-500/10 via-accent-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 border border-accent-500/20 rounded-sm group-hover:border-accent-500/40 transition-all duration-500"></div>
                    <div class="relative z-10 p-8 md:p-10">
                        <div class="stat-number mb-4">15+</div>
                        <p class="text-slate-300 font-medium text-base md:text-lg group-hover:text-slate-200 transition-colors duration-300">{{ __('Години опит') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Products Collection Section -->
    <section id="products" class="py-24 md:py-32 bg-slate-950 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(59,130,246,0.08),transparent_70%)]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-12 md:mb-20">
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-accent-500/10 backdrop-blur-sm border border-accent-500/30 rounded-sm">
                    <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="text-sm font-semibold text-accent-300 tracking-wide">{{ __('Продуктова колекция') }}</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    {{ __('Нашите продукти') }}
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-accent-500 to-accent-600 mx-auto mb-6"></div>
                <p class="text-lg md:text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    {{ __('Прегледайте нашата колекция от прецизни метални детайли и компоненти, изработени с най-високо качество и внимание към детайла') }}
                </p>
            </div>

            @if(isset($products) && count($products) > 0)
                <!-- Product Cards Grid -->
                <div class="relative max-w-7xl mx-auto">
                    <!-- Gradient Lines Between Cards (Hidden on mobile and tablet) -->
                    @if(count($products) > 1)
                        <div class="hidden lg:block absolute top-0 bottom-0 left-1/3 -translate-x-1/2 w-px">
                            <div class="h-full w-full bg-gradient-to-b from-transparent via-accent-500/40 to-transparent"></div>
                        </div>
                    @endif
                    @if(count($products) > 2)
                        <div class="hidden lg:block absolute top-0 bottom-0 left-2/3 -translate-x-1/2 w-px">
                            <div class="h-full w-full bg-gradient-to-b from-transparent via-accent-500/40 to-transparent"></div>
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">
                    @foreach($products as $index => $product)
                        <!-- Product Library Card -->
                        <div onclick="openProductGallery({{ $index }}, 0)"
                             class="card-library group cursor-pointer relative overflow-hidden bg-gradient-to-br from-slate-800/60 via-slate-900/60 to-slate-900/80 border-2 border-slate-700/50 hover:border-accent-500/70 transition-all duration-700 shadow-2xl hover:shadow-accent-500/30 hover:scale-[1.02] rounded-sm">
                            
                            <!-- Main Product Image -->
                            <div class="aspect-[4/3] overflow-hidden relative">
                                <img src="{{ asset($product['thumbnail']) }}"
                                     alt="{{ $product['name'] }}"
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110">
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-950/50 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-500"></div>
                                
                                <!-- Category Badge (Bottom Left) -->
                                <div class="absolute bottom-4 left-4 transform group-hover:translate-x-1 transition-transform duration-500">
                                    <div class="px-4 py-2.5 bg-gradient-to-r from-slate-800/95 via-slate-700/95 to-slate-800/95 backdrop-blur-md border border-accent-500/30 rounded-sm shadow-lg">
                                        <span class="text-white text-sm font-bold uppercase tracking-wider drop-shadow-lg">{{ __(ucfirst(str_replace('-', ' ', $product['name']))) }}</span>
                                    </div>
                                </div>
                                
                                <!-- Shine Effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 pointer-events-none"></div>
                            </div>
                            
                            <!-- Card Content -->
                            <div class="p-6 md:p-8 flex flex-col">
                                <!-- Title - Fixed Height Area -->
                                <div class="flex items-start gap-4 min-h-[100px] mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-accent-500/20 to-accent-600/20 rounded-sm flex items-center justify-center border border-accent-500/30 flex-shrink-0 group-hover:from-accent-500/30 group-hover:to-accent-600/30 transition-all duration-500">
                                        <svg class="w-6 h-6 text-accent-400 group-hover:text-accent-300 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-xl md:text-2xl font-bold text-white mb-2 group-hover:text-accent-300 transition-colors duration-500">
                                            {{ __(ucfirst(str_replace('-', ' ', $product['name']))) }}
                                        </h3>
                                        <p class="text-slate-400 text-sm md:text-base group-hover:text-slate-300 transition-colors duration-500">
                                            {{ __('Прецизна изработка с високо качество') }}
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Action Button - Always at Bottom -->
                                <div class="mt-auto">
                                    <div class="inline-flex items-center gap-2 text-accent-400 group-hover:text-accent-300 text-sm md:text-base font-semibold transition-all duration-500">
                                        <span>{{ __('Разгледай галерията') }}</span>
                                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-2 duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Card Glow Effect -->
                            <div class="absolute -bottom-20 -right-20 w-40 h-40 bg-accent-500/10 rounded-full blur-3xl opacity-0 group-hover:opacity-60 transition-opacity duration-700 pointer-events-none"></div>
                            <div class="absolute -top-10 -left-10 w-32 h-32 bg-accent-500/5 rounded-full blur-2xl opacity-0 group-hover:opacity-40 transition-opacity duration-700 pointer-events-none"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-20 h-20 bg-slate-800/50 rounded-sm flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <p class="text-slate-400 text-lg">{{ __('Няма налични продукти в момента.') }}</p>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Natural Fade Out -->
        <div class="relative mt-20 md:mt-32 h-40 overflow-hidden pointer-events-none">
            <!-- Very smooth natural fade with multiple stops -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-950/20 to-slate-950/80"></div>
        </div>
    </section>

    <!-- Product Gallery Modal -->
    <div id="product-gallery-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/95 backdrop-blur-md">
        <div id="modal-inner-container" class="relative w-full h-full flex items-center justify-center p-4 md:p-8">
            <!-- Close Button -->
            <button onclick="closeProductGallery()" class="absolute top-4 right-4 md:top-6 md:right-6 z-50 w-12 h-12 md:w-14 md:h-14 rounded-sm bg-accent-500/90 hover:bg-accent-500 backdrop-blur-sm border-2 border-accent-400/50 flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg shadow-accent-500/30">
                <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Image Container -->
            <div class="max-w-7xl max-h-full flex items-center justify-center relative w-full">
                <img id="gallery-image" src="" alt="" class="max-w-full max-h-[85vh] md:max-h-[90vh] object-contain rounded-sm shadow-2xl transition-opacity duration-300">

                <!-- Previous Button -->
                <button onclick="changeGalleryImage(-1)" class="absolute left-2 md:left-4 z-50 w-14 h-14 md:w-16 md:h-16 rounded-sm bg-accent-500/90 hover:bg-accent-500 backdrop-blur-sm border-2 border-accent-400/50 flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg shadow-accent-500/30 group">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <!-- Next Button -->
                <button onclick="changeGalleryImage(1)" class="absolute right-2 md:right-4 z-50 w-14 h-14 md:w-16 md:h-16 rounded-sm bg-accent-500/90 hover:bg-accent-500 backdrop-blur-sm border-2 border-accent-400/50 flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg shadow-accent-500/30 group">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Image Counter and Product Name -->
            <div class="absolute bottom-4 md:bottom-6 left-1/2 transform -translate-x-1/2 z-50 bg-accent-500/90 backdrop-blur-sm px-5 md:px-7 py-2.5 md:py-3.5 rounded-sm border-2 border-accent-400/50 text-center shadow-lg shadow-accent-500/30">
                <span id="gallery-image-counter" class="text-white text-sm md:text-base font-semibold"></span>
            </div>
        </div>
    </div>

    <script>
        const products = @json($products ?? []);
        let currentProductIndex = 0;
        let currentImageIndex = 0;

        function openProductGallery(productIndex, imageIndex = 0) {
            currentProductIndex = productIndex;
            currentImageIndex = imageIndex;
            updateGalleryImage();
            document.getElementById('product-gallery-modal').classList.remove('hidden');
            document.getElementById('product-gallery-modal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeProductGallery() {
            document.getElementById('product-gallery-modal').classList.add('hidden');
            document.getElementById('product-gallery-modal').classList.remove('flex');
            document.body.style.overflow = '';
        }

        function changeGalleryImage(direction) {
            const product = products[currentProductIndex];
            currentImageIndex += direction;
            if (currentImageIndex < 0) {
                currentImageIndex = product.images.length - 1;
            } else if (currentImageIndex >= product.images.length) {
                currentImageIndex = 0;
            }
            updateGalleryImage();
        }

        function updateGalleryImage() {
            const product = products[currentProductIndex];
            const imagePath = product.images[currentImageIndex];
            const baseUrl = '{{ asset("") }}';
            const imgElement = document.getElementById('gallery-image');

            // Fade out
            imgElement.style.opacity = '0';

            setTimeout(() => {
                imgElement.src = baseUrl + imagePath;
                imgElement.alt = '{{ __('Продукт') }} ' + (currentImageIndex + 1);
                document.getElementById('gallery-image-counter').textContent = (currentImageIndex + 1) + ' / ' + product.images.length;

                // Fade in
                imgElement.style.opacity = '1';
            }, 150);
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('product-gallery-modal');
            if (!modal.classList.contains('hidden')) {
                if (e.key === 'Escape') {
                    closeProductGallery();
                } else if (e.key === 'ArrowLeft') {
                    changeGalleryImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeGalleryImage(1);
                }
            }
        });

        // Close on background click
        document.getElementById('modal-inner-container').addEventListener('click', function(e) {
            const imageContainer = this.querySelector('.max-w-7xl');
            const closeBtn = this.querySelector('button[onclick="closeProductGallery()"]');
            const prevBtn = this.querySelector('button[onclick="changeGalleryImage(-1)"]');
            const nextBtn = this.querySelector('button[onclick="changeGalleryImage(1)"]');
            const counter = this.querySelector('#gallery-image-counter').parentElement;

            // Close if clicking on inner container but outside image container and buttons
            if (e.target === this ||
                (!imageContainer.contains(e.target) &&
                    e.target !== closeBtn &&
                    e.target !== prevBtn &&
                    e.target !== nextBtn &&
                    !closeBtn.contains(e.target) &&
                    !prevBtn.contains(e.target) &&
                    !nextBtn.contains(e.target) &&
                    !counter.contains(e.target))) {
                closeProductGallery();
            }
        });
    </script>
@endsection


@extends('layouts.app')

@section('title', __('За нас - Станчев и Син 2025 ЕООД'))

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

<!-- Our Story Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
            <div class="space-y-6">
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
                                {{ __('Всяка детайл е изработен с внимание към перфектността. Използваме модерни технологии и строг контрол на качеството.') }}
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
            <div class="grid grid-cols-2 gap-4">
                @php
                    $craftImages = [
                        ['src' => 'metalworking-images/premium_photo-1664303560361-2b31c2d2c0ba.avif', 'alt' => __('Заваръчни работи')],
                        ['src' => 'metalworking-images/photo-1676646693434-8ee684e8ba49.avif', 'alt' => __('CNC обработка')],
                        ['src' => 'images/4072F7BC-9D87-482F-9A07-99157C645FAF.jpg', 'alt' => __('Металообработка')],
                        ['src' => 'images/6A9C79BF-6A9D-4B5A-9E09-7EC87669B3A9.jpg', 'alt' => __('Производство')]
                    ];
                @endphp
                @foreach($craftImages as $index => $img)
                    <div class="{{ $index === 0 ? 'col-span-2' : '' }} group relative overflow-hidden rounded-sm border border-slate-800/50 hover:border-accent-500/50 transition-all duration-500">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ asset($img['src']) }}" alt="{{ $img['alt'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center card card-hover">
                <div class="text-5xl font-bold text-accent-500 mb-4">2015</div>
                <p class="text-slate-400 font-medium">{{ __('Година основаване') }}</p>
            </div>
            <div class="text-center card card-hover">
                <div class="text-5xl font-bold text-accent-500 mb-4">100%</div>
                <p class="text-slate-400 font-medium">{{ __('Прецизност') }}</p>
            </div>
            <div class="text-center card card-hover">
                <div class="text-5xl font-bold text-accent-500 mb-4">10+</div>
                <p class="text-slate-400 font-medium">{{ __('Години опит') }}</p>
            </div>
        </div>
        
        <!-- Our Mission Section -->
        <div class="mt-20 mb-20">
            <div class="card bg-gradient-to-br from-slate-900/80 to-slate-800/50 border-accent-500/30">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('Нашата мисия') }}</h2>
                </div>
                <div class="max-w-4xl mx-auto">
                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed text-center">
                        {{ __('Да правим най-доброто за клиентите и да осигуряваме качество и добро отношение по време на работа.') }}
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Clients Section -->
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-white mb-12 text-center">{{ __('Наши клиенти') }}</h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="card card-hover text-center">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-sm flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Металик АД</h3>
                    <p class="text-slate-400">{{ __('Доверен партньор') }}</p>
                </div>
                <div class="card card-hover text-center">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-sm flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">ЗГПУ Импулс</h3>
                    <p class="text-slate-400">{{ __('Доверен партньор') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


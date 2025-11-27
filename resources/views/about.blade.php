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
                <div class="mission-card relative overflow-hidden group">
                    <!-- Background gradient effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/95 via-slate-800/70 to-slate-900/95 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute inset-0 border-2 border-accent-500/20 group-hover:border-accent-500/50 transition-all duration-500 rounded-sm"></div>

                    <!-- Content -->
                    <div class="relative z-10 p-10 md:p-16">
                        <!-- Badge -->
                        <div class="flex justify-center mb-8">
                            <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-accent-500/10 backdrop-blur-sm border border-accent-500/30 rounded-sm group-hover:bg-accent-500/15 group-hover:border-accent-500/40 transition-all duration-300">
                                <svg class="w-5 h-5 text-accent-400 group-hover:text-accent-300 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span class="text-sm font-semibold text-accent-300 group-hover:text-accent-200 tracking-wide transition-colors duration-300">{{ __('Нашата мисия') }}</span>
                            </div>
                        </div>

                        <!-- Main Title -->
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-8 text-center leading-tight">
                            {{ __('Нашата мисия') }}
                        </h2>

                        <!-- Mission Statement -->
                        <div class="max-w-3xl mx-auto">
                            <p class="text-xl md:text-2xl text-slate-300 leading-relaxed text-center group-hover:text-slate-200 transition-colors duration-300">
                                {{ __('Да правим най-доброто за клиентите и да осигуряваме качество и добро отношение по време на работа.') }}
                            </p>
                        </div>

                        <!-- Shine effect on hover -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<!-- Hero Section - Alternative 4: Modern with Icon Grid -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        @php
            $heroImages = [
                'metalworking-images/premium_photo-1664303560361-2b31c2d2c0ba.avif',
                'metalworking-images/photo-1598302936625-6075fbd98dd7.avif',
                'images/0110ADEA-670A-420F-9262-F13900A5F543.jpg'
            ];
            $dayOfYear = date('z');
            $heroImage = $heroImages[$dayOfYear % count($heroImages)];
        @endphp
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
        <img src="{{ asset($heroImage) }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-radial"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-5 gap-8 items-center">
            <!-- Left: Icons/Features -->
            <div class="lg:col-span-2 hidden lg:grid grid-cols-2 gap-4 animate-fade-in">
                <div class="card card-hover text-center p-6">
                    <svg class="w-12 h-12 text-accent-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-slate-400">{{ __('Качество') }}</p>
                </div>
                <div class="card card-hover text-center p-6">
                    <svg class="w-12 h-12 text-accent-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <p class="text-sm text-slate-400">{{ __('Прецизност') }}</p>
                </div>
                <div class="card card-hover text-center p-6">
                    <svg class="w-12 h-12 text-accent-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-slate-400">{{ __('Навременност') }}</p>
                </div>
                <div class="card card-hover text-center p-6">
                    <svg class="w-12 h-12 text-accent-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <p class="text-sm text-slate-400">{{ __('Надеждност') }}</p>
                </div>
            </div>
            
            <!-- Center: Main Content -->
            <div class="lg:col-span-3 text-center lg:text-left animate-fade-in">
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-accent-500/20 backdrop-blur-sm border border-accent-500/40 rounded-sm">
                    <svg class="w-4 h-4 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-semibold text-accent-300">{{ __('От 2015 година') }}</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6 text-white leading-tight">
                    <span class="block">{{ __('Прецизна') }}</span>
                    <span class="block text-gradient mt-2">{{ __('Металообработка') }}</span>
                </h1>
                
                <div class="space-y-4 mb-10 max-w-2xl mx-auto lg:mx-0">
                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                        {{ __('Индустриални решения с внимание към всеки детайл.') }}
                    </p>
                    <p class="text-lg md:text-xl text-slate-400 leading-relaxed">
                        {{ __('Професионализъм, качество и прецизност във всяка работа.') }}
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('portfolio') }}" class="btn-primary">
                        {{ __('Виж проектите') }}
                    </a>
                    <a href="{{ route('contact') }}" class="btn-secondary">
                        {{ __('Свържи се с нас') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>


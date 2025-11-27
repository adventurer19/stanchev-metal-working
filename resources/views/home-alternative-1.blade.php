<!-- Hero Section - Alternative 1: Split Layout with Left Aligned Text -->
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
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/95 to-slate-950/80"></div>
        <img src="{{ asset($heroImage) }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-15">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Text Content -->
            <div class="text-left animate-fade-in">
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-accent-500/10 backdrop-blur-sm border border-accent-500/30 rounded-sm">
                    <div class="w-2 h-2 bg-accent-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-accent-400 tracking-wide">{{ __('От 2015 година') }}</span>
                </div>
                
                <div class="mb-6">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 text-white leading-tight">
                        <span class="block">{{ __('Прецизна') }}</span>
                        <span class="block text-gradient mt-2">{{ __('Металообработка') }}</span>
                    </h1>
                </div>
                
                <div class="space-y-4 mb-10">
                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                        {{ __('Индустриални решения с внимание към всеки детайл.') }}
                    </p>
                    <p class="text-lg md:text-xl text-slate-400 leading-relaxed">
                        {{ __('Професионализъм, качество и прецизност във всяка работа.') }}
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('about') }}" class="btn-primary">
                        {{ __('Виж проектите') }}
                    </a>
                    <a href="{{ route('contact') }}" class="btn-secondary">
                        {{ __('Свържи се с нас') }}
                    </a>
                </div>
            </div>
            
            <!-- Right: Visual Element / Stats Cards -->
            <div class="hidden lg:grid grid-cols-2 gap-4 animate-fade-in" style="animation-delay: 0.2s">
                <div class="card card-hover text-center p-6">
                    <div class="text-4xl font-bold text-accent-500 mb-2">2015</div>
                    <p class="text-slate-400 text-sm">{{ __('Година основаване') }}</p>
                </div>
                <div class="card card-hover text-center p-6">
                    <div class="text-4xl font-bold text-accent-500 mb-2">100%</div>
                    <p class="text-slate-400 text-sm">{{ __('Прецизност') }}</p>
                </div>
                <div class="card card-hover text-center p-6">
                    <div class="text-4xl font-bold text-accent-500 mb-2">10+</div>
                    <p class="text-slate-400 text-sm">{{ __('Години опит') }}</p>
                </div>
                <div class="card card-hover text-center p-6">
                    <div class="text-4xl font-bold text-accent-500 mb-2">∞</div>
                    <p class="text-slate-400 text-sm">{{ __('Качество') }}</p>
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



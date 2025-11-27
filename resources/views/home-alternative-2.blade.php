<!-- Hero Section - Alternative 2: Centered with Animated Badge -->
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
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/95 via-slate-950/85 to-slate-950"></div>
        <img src="{{ asset($heroImage) }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-25">
        <div class="absolute inset-0 bg-gradient-radial"></div>
    </div>
    
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 mb-8 px-6 py-3 bg-slate-900/60 backdrop-blur-xl border border-accent-500/40 rounded-sm shadow-2xl shadow-accent-500/20 animate-slide-down">
            <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm font-bold text-accent-300 tracking-wider uppercase">{{ __('От 2015 година') }}</span>
        </div>
        
        <!-- Main Heading -->
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold mb-6 text-white leading-tight animate-fade-in">
            <span class="block mb-2">{{ __('Прецизна') }}</span>
            <span class="block text-gradient bg-clip-text text-transparent bg-gradient-to-r from-accent-400 via-accent-500 to-accent-600">
                {{ __('Металообработка') }}
            </span>
        </h1>
        
        <!-- Description in Card Style -->
        <div class="max-w-4xl mx-auto mb-12 animate-fade-in" style="animation-delay: 0.1s">
            <div class="glass rounded-sm p-8 border border-slate-800/50 shadow-xl">
                <p class="text-xl md:text-2xl text-slate-200 leading-relaxed mb-4">
                    {{ __('Индустриални решения с внимание към всеки детайл.') }}
                </p>
                <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                    {{ __('Професионализъм, качество и прецизност във всяка работа.') }}
                </p>
            </div>
        </div>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in" style="animation-delay: 0.2s">
            <a href="{{ route('about') }}" class="btn-primary text-lg px-8 py-4">
                {{ __('Виж проектите') }}
            </a>
            <a href="{{ route('contact') }}" class="btn-secondary text-lg px-8 py-4">
                {{ __('Свържи се с нас') }}
            </a>
        </div>
    </div>
    
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>



<!-- Hero Section - Alternative 3: Minimalist with Large Typography -->
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
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/92 via-slate-950/88 to-slate-950"></div>
        <img src="{{ asset($heroImage) }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-10">
    </div>
    
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
        <!-- Minimal Badge -->
        <div class="mb-10 animate-fade-in">
            <span class="inline-block px-4 py-1.5 text-xs font-semibold text-accent-400 uppercase tracking-widest border-b-2 border-accent-500/50">
                {{ __('От 2015 година') }}
            </span>
        </div>
        
        <!-- Large Typography -->
        <h1 class="text-6xl md:text-8xl lg:text-9xl font-black mb-8 text-white leading-none tracking-tight animate-fade-in" style="animation-delay: 0.1s">
            <span class="block">{{ __('Прецизна') }}</span>
            <span class="block text-gradient mt-2">{{ __('Металообработка') }}</span>
        </h1>
        
        <!-- Split Description -->
        <div class="max-w-3xl mx-auto mb-16 space-y-6 animate-fade-in" style="animation-delay: 0.2s">
            <div class="h-px bg-gradient-to-r from-transparent via-accent-500/50 to-transparent"></div>
            <p class="text-2xl md:text-3xl text-slate-300 font-light leading-relaxed">
                {{ __('Индустриални решения с внимание към всеки детайл.') }}
            </p>
            <p class="text-xl md:text-2xl text-slate-400 font-light leading-relaxed">
                {{ __('Професионализъм, качество и прецизност във всяка работа.') }}
            </p>
            <div class="h-px bg-gradient-to-r from-transparent via-accent-500/50 to-transparent"></div>
        </div>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in" style="animation-delay: 0.3s">
            <a href="{{ route('portfolio') }}" class="btn-primary text-lg px-10 py-4 min-w-[200px]">
                {{ __('Виж проектите') }}
            </a>
            <a href="{{ route('contact') }}" class="btn-secondary text-lg px-10 py-4 min-w-[200px]">
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


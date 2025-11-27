<!-- Hero Section - Alternative 5: Asymmetric Layout with Quote Style -->
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
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950/95 via-slate-950/85 to-slate-950"></div>
        <img src="{{ asset($heroImage) }}" alt="{{ __('Металообработка') }}" class="w-full h-full object-cover opacity-15">
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-5xl mx-auto">
            <!-- Top Badge -->
            <div class="flex justify-center mb-8 animate-fade-in">
                <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900/60 backdrop-blur-xl border border-accent-500/30 rounded-sm">
                    <div class="w-1.5 h-1.5 bg-accent-500 rounded-full"></div>
                    <span class="text-xs font-bold text-accent-400 uppercase tracking-widest">{{ __('От 2015 година') }}</span>
                </div>
            </div>
            
            <!-- Main Heading with Quote Mark Style -->
            <div class="mb-12 animate-fade-in" style="animation-delay: 0.1s">
                <div class="flex items-start gap-4 mb-6">
                    <svg class="w-12 h-12 md:w-16 md:h-16 text-accent-500/30 flex-shrink-0 mt-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.996 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.984zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                    <div class="flex-1">
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white leading-tight mb-4">
                            <span class="block">{{ __('Прецизна') }}</span>
                            <span class="block text-gradient mt-2">{{ __('Металообработка') }}</span>
                        </h1>
                    </div>
                </div>
            </div>
            
            <!-- Description in Elegant Style -->
            <div class="pl-8 md:pl-16 mb-12 space-y-6 animate-fade-in" style="animation-delay: 0.2s">
                <div class="h-0.5 w-20 bg-gradient-to-r from-accent-500 to-transparent mb-6"></div>
                <p class="text-xl md:text-2xl text-slate-200 leading-relaxed font-light">
                    {{ __('Индустриални решения с внимание към всеки детайл.') }}
                </p>
                <p class="text-lg md:text-xl text-slate-300 leading-relaxed font-light">
                    {{ __('Професионализъм, качество и прецизност във всяка работа.') }}
                </p>
                <div class="h-0.5 w-20 bg-gradient-to-r from-accent-500 to-transparent mt-6"></div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="pl-8 md:pl-16 flex flex-col sm:flex-row gap-4 animate-fade-in" style="animation-delay: 0.3s">
                <a href="{{ route('about') }}" class="btn-primary">
                    {{ __('Виж проектите') }}
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary">
                    {{ __('Свържи се с нас') }}
                </a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>



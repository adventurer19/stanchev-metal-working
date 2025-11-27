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

<!-- About Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left: Text Content -->
            <div class="space-y-6">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                    {{ __('Прецизна металообработка и висококачествено производство') }}
                </h2>
                <div class="space-y-4">
                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                        {{ __('Като семеен бизнес с дългогодишна традиция, ние се специализираме в изработката на метални компоненти и детайли, създадени по най-високи стандарти за качество, точност и надеждност. Нашият опит, ни позволява да изпълняваме дори най-строгите технически изисквания и спецификации в индустрията.') }}
                    </p>
                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
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
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid md:grid-cols-3 gap-6 lg:gap-8 mb-20">
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

<!-- Products Grid Section -->
<section id="products" class="py-24 md:py-32 bg-slate-950 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12 md:mb-20">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">
                {{ __('Нашите продукти') }}
            </h2>
            <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto">
                {{ __('Прегледайте нашите продукти и проекти в областта на прецизната металообработка') }}
            </p>
        </div>
        
        @if(isset($products) && count($products) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($products as $index => $product)
                    <div onclick="openProductGallery({{ $index }})" class="product-card group relative cursor-pointer">
                        <!-- Card Container -->
                        <div class="relative overflow-hidden rounded-sm bg-slate-900/80 backdrop-blur-sm border-2 border-slate-800/50 group-hover:border-accent-500/50 transition-all duration-500 shadow-lg group-hover:shadow-2xl group-hover:shadow-accent-500/20">
                            <!-- Image Container -->
                            <div class="aspect-[4/3] overflow-hidden relative">
                                <img src="{{ asset($product['thumbnail']) }}" 
                                     alt="{{ $product['name'] }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                <!-- Image Counter Badge -->
                                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-2 group-hover:translate-y-0">
                                    <div class="px-3 py-1.5 bg-black/60 backdrop-blur-md border border-white/20 rounded-sm">
                                        <span class="text-white text-xs font-semibold flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ count($product['images']) }} {{ __('снимки') }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- View Icon -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="w-16 h-16 rounded-sm bg-white/10 backdrop-blur-md border-2 border-white/20 flex items-center justify-center transform scale-90 group-hover:scale-100 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Product Info -->
                            <div class="p-6 flex items-center justify-center">
                                <div class="flex items-center gap-2 text-accent-400 text-sm font-medium">
                                    <span>{{ __('Разгледай') }}</span>
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-slate-400 text-lg">{{ __('Няма налични продукти в момента.') }}</p>
            </div>
        @endif
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
    
    function openProductGallery(productIndex) {
        currentProductIndex = productIndex;
        currentImageIndex = 0;
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
            imgElement.alt = product.name + ' - {{ __('Снимка') }} ' + (currentImageIndex + 1);
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

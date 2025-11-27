<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('Прецизна металообработка и индустриални решения в България') }}">
    <title>@yield('title', __('Станчев и Син 2025 ЕООД - Прецизна металообработка'))</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon-optimized.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon-optimized.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon-optimized.svg') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-950 text-slate-100">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 glass border-b border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24 md:h-28">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex flex-col leading-tight hover:opacity-90 transition-opacity duration-300">
                        <span class="text-2xl md:text-3xl lg:text-4xl font-bold text-gradient">Станчев и Син</span>
                        <span class="text-sm md:text-base lg:text-lg font-medium text-slate-400">2025 ЕООД</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">{{ __('Начало') }}</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') || request()->routeIs('portfolio') ? 'nav-link-active' : '' }}">{{ __('За нас') }}</a>
                    <a href="{{ route('why-us') }}" class="nav-link {{ request()->routeIs('why-us') ? 'nav-link-active' : '' }}">{{ __('Защо ние') }}</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'nav-link-active' : '' }}">{{ __('Контакти') }}</a>
                </div>
                <div class="flex items-center space-x-4 md:space-x-5">
                    <div class="flex items-center space-x-1.5 bg-slate-900/50 rounded-sm p-1.5 md:p-2 border border-slate-800">
                        <a href="{{ route('locale', 'bg') }}" class="px-4 py-2 md:px-5 md:py-2.5 text-sm md:text-base font-semibold rounded-sm transition-all duration-300 {{ app()->getLocale() === 'bg' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/30' : 'text-slate-400 hover:text-slate-200' }}">БГ</a>
                        <a href="{{ route('locale', 'en') }}" class="px-4 py-2 md:px-5 md:py-2.5 text-sm md:text-base font-semibold rounded-sm transition-all duration-300 {{ app()->getLocale() === 'en' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/30' : 'text-slate-400 hover:text-slate-200' }}">EN</a>
                    </div>
                    <button id="mobile-menu-btn" class="md:hidden p-2.5 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-sm transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="hidden md:hidden fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-40 transition-opacity duration-300"></div>
    
    <!-- Mobile Menu Sidebar -->
    <div id="mobile-menu" class="hidden md:hidden fixed top-0 left-0 h-full w-64 bg-slate-900/95 backdrop-blur-xl border-r border-slate-800/50 z-50" style="left: 0; right: auto; transform: translateX(-100%); transition: transform 0.3s ease-in-out; will-change: transform;">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between p-4 border-b border-slate-800/50">
                <span class="text-lg font-bold text-white">Меню</span>
                <button id="mobile-menu-close" class="p-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-sm transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-sm transition-all duration-300">{{ __('Начало') }}</a>
                <a href="{{ route('about') }}" class="block px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-sm transition-all duration-300">{{ __('За нас') }}</a>
                <a href="{{ route('why-us') }}" class="block px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-sm transition-all duration-300">{{ __('Защо ние') }}</a>
                <a href="{{ route('contact') }}" class="block px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-sm transition-all duration-300">{{ __('Контакти') }}</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-24 md:pt-28">
        @yield('content')
    </main>

    <!-- Cookie Consent Banner -->
    <div id="cookie-consent" class="hidden fixed left-0 right-0 z-40 transition-all duration-500 ease-in-out top-20 md:top-auto md:bottom-0">
        <div class="glass border-t md:border-t-0 md:border-b border-slate-800/50 shadow-2xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                            <h3 class="text-sm font-semibold text-white">{{ __('Използваме бисквитки') }}</h3>
                        </div>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            {{ __('Този сайт използва бисквитки, за да подобри вашето потребителско изживяване. Като продължавате да използвате сайта, вие се съгласявате с използването на бисквитки.') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <button id="cookie-decline" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white bg-slate-800/50 hover:bg-slate-800 border border-slate-700 rounded-sm transition-all duration-300">
                            {{ __('Отказ') }}
                        </button>
                        <button id="cookie-accept" class="px-6 py-2 text-sm font-semibold text-white bg-gradient-to-r from-accent-500 to-accent-600 hover:from-accent-600 hover:to-accent-700 rounded-sm transition-all duration-300 transform hover:scale-[1.02] shadow-lg shadow-accent-500/30 active:scale-[0.98] border border-accent-600/50">
                            {{ __('Приемам') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800/50 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold text-gradient mb-4">СТАНЧЕВ И СИН 2025 ЕООД</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        {{ __('Прецизна металообработка и индустриални решения от 2015 година.') }}
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">{{ __('Навигация') }}</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-accent-400 transition-colors text-sm">{{ __('Начало') }}</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-accent-400 transition-colors text-sm">{{ __('За нас') }}</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-accent-400 transition-colors text-sm">{{ __('За нас') }}</a></li>
                        <li><a href="{{ route('why-us') }}" class="text-slate-400 hover:text-accent-400 transition-colors text-sm">{{ __('Защо ние') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">{{ __('Контакти') }}</h4>
                    <ul class="space-y-2 text-slate-400 text-sm">
                        <li>{{ __('Болтата, бул. „Столетов" 162') }}</li>
                        <li><a href="tel:+35977855070" class="hover:text-accent-400 transition-colors">+359 77855070</a></li>
                        <li><a href="mailto:stanchev_sin2025@abv.bg" class="hover:text-accent-400 transition-colors">stanchev_sin2025@abv.bg</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">{{ __('Следвайте ни') }}</h4>
                    <p class="text-slate-400 text-sm mb-4">
                        {{ __('Свържете се с нас за професионални решения.') }}
                    </p>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center">
                <p class="text-slate-400 text-sm">© {{ date('Y') }} <span class="text-gradient font-semibold">СТАНЧЕВ И СИН 2025 ЕООД</span>. {{ __('Всички права запазени') }}</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        
        function openMobileMenu() {
            if (!mobileMenu || !mobileMenuOverlay) return;
            
            // Ensure menu is positioned from left
            mobileMenu.style.left = '0';
            mobileMenu.style.right = 'auto';
            mobileMenu.style.transform = 'translateX(-100%)';
            
            mobileMenu.classList.remove('hidden');
            mobileMenuOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent body scroll
            
            // Force reflow to ensure transition works
            requestAnimationFrame(() => {
                mobileMenu.style.transform = 'translateX(0)';
            });
        }
        
        function closeMobileMenu() {
            if (!mobileMenu || !mobileMenuOverlay) return;
            
            mobileMenu.style.transform = 'translateX(-100%)';
            mobileMenuOverlay.classList.add('hidden');
            document.body.style.overflow = ''; // Restore body scroll
            
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        }
        
        // Open menu
        mobileMenuBtn?.addEventListener('click', function(e) {
            e.stopPropagation();
            openMobileMenu();
        });
        
        // Close menu buttons
        mobileMenuClose?.addEventListener('click', function(e) {
            e.stopPropagation();
            closeMobileMenu();
        });
        
        // Close menu when clicking overlay
        mobileMenuOverlay?.addEventListener('click', function() {
            closeMobileMenu();
        });
        
        // Close menu when clicking on menu links
        mobileMenu?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                closeMobileMenu();
            });
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                closeMobileMenu();
            }
        });

        // Navbar scroll effect
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                navbar.classList.add('bg-slate-950/95');
                navbar.classList.remove('bg-slate-900/95');
            } else {
                navbar.classList.remove('bg-slate-950/95');
                navbar.classList.add('bg-slate-900/95');
            }
            
            lastScroll = currentScroll;
        });

        // Handle anchor links with smooth scroll
        window.addEventListener('load', function() {
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                const element = document.getElementById(hash);
                if (element) {
                    setTimeout(() => {
                        const offsetTop = element.offsetTop - 80; // Account for fixed navbar
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }, 100);
                }
            }
        });

        // Handle anchor links on same page
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    const targetId = href.substring(1);
                    const target = document.getElementById(targetId);
                    if (target) {
                        e.preventDefault();
                        const offsetTop = target.offsetTop - 80;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observer for stat cards with staggered animation
        const statObserverOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        };

        const statObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    statObserver.unobserve(entry.target);
                }
            });
        }, statObserverOptions);

        document.querySelectorAll('.card, section > div').forEach(el => {
            observer.observe(el);
        });

        // Observe stat cards
        document.querySelectorAll('.stat-card').forEach((el, index) => {
            statObserver.observe(el);
        });

        // Cookie Consent
        const cookieConsent = document.getElementById('cookie-consent');
        const cookieAccept = document.getElementById('cookie-accept');
        const cookieDecline = document.getElementById('cookie-decline');
        
        if (cookieConsent && cookieAccept && cookieDecline) {
            // Check if user has already made a choice
            const cookieConsentGiven = localStorage.getItem('cookieConsent');
            
            if (!cookieConsentGiven) {
                // Show cookie banner after a short delay
                setTimeout(() => {
                    cookieConsent.classList.remove('hidden');
                    // Add animation class based on screen size
                    if (window.innerWidth >= 768) {
                        cookieConsent.classList.add('cookie-slide-up');
                    } else {
                        cookieConsent.classList.add('cookie-slide-down');
                    }
                }, 1000);
            }
            
            // Handle accept
            cookieAccept.addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'accepted');
                hideCookieBanner();
            });
            
            // Handle decline
            cookieDecline.addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'declined');
                hideCookieBanner();
            });
            
            function hideCookieBanner() {
                if (window.innerWidth >= 768) {
                    cookieConsent.style.transform = 'translateY(100%)';
                } else {
                    cookieConsent.style.transform = 'translateY(-100%)';
                }
                cookieConsent.style.opacity = '0';
                cookieConsent.style.transition = 'all 0.5s ease-in-out';
                setTimeout(() => {
                    cookieConsent.classList.add('hidden');
                }, 500);
            }
        }
    </script>
</body>
</html>


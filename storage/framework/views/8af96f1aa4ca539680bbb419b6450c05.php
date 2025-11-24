<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo e(__('Прецизна металообработка и индустриални решения в България')); ?>">
    <title><?php echo $__env->yieldContent('title', __('Станчев и Син 2025 ЕООД - Прецизна металообработка')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="antialiased bg-slate-950 text-slate-100">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 glass border-b border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold text-white hover:text-accent-400 transition-colors duration-300">
                        <span class="text-gradient">СТАНЧЕВ И СИН</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo e(route('home')); ?>" class="px-4 py-2 text-sm font-medium <?php echo e(request()->routeIs('home') ? 'text-accent-400 bg-slate-800/50' : 'text-slate-300 hover:text-white hover:bg-slate-800/50'); ?> rounded-lg transition-all duration-300"><?php echo e(__('Начало')); ?></a>
                    <a href="<?php echo e(route('about')); ?>" class="px-4 py-2 text-sm font-medium <?php echo e(request()->routeIs('about') ? 'text-accent-400 bg-slate-800/50' : 'text-slate-300 hover:text-white hover:bg-slate-800/50'); ?> rounded-lg transition-all duration-300"><?php echo e(__('За нас')); ?></a>
                    <a href="<?php echo e(route('portfolio')); ?>" class="px-4 py-2 text-sm font-medium <?php echo e(request()->routeIs('portfolio') ? 'text-accent-400 bg-slate-800/50' : 'text-slate-300 hover:text-white hover:bg-slate-800/50'); ?> rounded-lg transition-all duration-300"><?php echo e(__('Портфолио')); ?></a>
                    <a href="<?php echo e(route('why-us')); ?>" class="px-4 py-2 text-sm font-medium <?php echo e(request()->routeIs('why-us') ? 'text-accent-400 bg-slate-800/50' : 'text-slate-300 hover:text-white hover:bg-slate-800/50'); ?> rounded-lg transition-all duration-300"><?php echo e(__('Защо ние')); ?></a>
                    <a href="<?php echo e(route('contact')); ?>" class="px-4 py-2 text-sm font-medium <?php echo e(request()->routeIs('contact') ? 'text-accent-400 bg-slate-800/50' : 'text-slate-300 hover:text-white hover:bg-slate-800/50'); ?> rounded-lg transition-all duration-300"><?php echo e(__('Контакти')); ?></a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-1 bg-slate-900/50 rounded-lg p-1 border border-slate-800">
                        <a href="<?php echo e(route('locale', 'bg')); ?>" class="px-3 py-1.5 text-xs font-medium rounded-md transition-all duration-300 <?php echo e(app()->getLocale() === 'bg' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/30' : 'text-slate-400 hover:text-slate-200'); ?>">БГ</a>
                        <a href="<?php echo e(route('locale', 'en')); ?>" class="px-3 py-1.5 text-xs font-medium rounded-md transition-all duration-300 <?php echo e(app()->getLocale() === 'en' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/30' : 'text-slate-400 hover:text-slate-200'); ?>">EN</a>
                    </div>
                    <button id="mobile-menu-btn" class="md:hidden p-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden glass border-t border-slate-800/50">
            <div class="px-4 py-4 space-y-2">
                <a href="<?php echo e(route('home')); ?>" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300"><?php echo e(__('Начало')); ?></a>
                <a href="<?php echo e(route('about')); ?>" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300"><?php echo e(__('За нас')); ?></a>
                <a href="<?php echo e(route('portfolio')); ?>" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300"><?php echo e(__('Портфолио')); ?></a>
                <a href="<?php echo e(route('why-us')); ?>" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300"><?php echo e(__('Защо ние')); ?></a>
                <a href="<?php echo e(route('contact')); ?>" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300"><?php echo e(__('Контакти')); ?></a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800/50 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold text-gradient mb-4">СТАНЧЕВ И СИН 2025 ЕООД</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        <?php echo e(__('Прецизна металообработка и индустриални решения от 2015 година.')); ?>

                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider"><?php echo e(__('Навигация')); ?></h4>
                    <ul class="space-y-2">
                        <li><a href="<?php echo e(route('home')); ?>" class="text-slate-400 hover:text-accent-400 transition-colors text-sm"><?php echo e(__('Начало')); ?></a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="text-slate-400 hover:text-accent-400 transition-colors text-sm"><?php echo e(__('За нас')); ?></a></li>
                        <li><a href="<?php echo e(route('portfolio')); ?>" class="text-slate-400 hover:text-accent-400 transition-colors text-sm"><?php echo e(__('Портфолио')); ?></a></li>
                        <li><a href="<?php echo e(route('why-us')); ?>" class="text-slate-400 hover:text-accent-400 transition-colors text-sm"><?php echo e(__('Защо ние')); ?></a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider"><?php echo e(__('Контакти')); ?></h4>
                    <ul class="space-y-2 text-slate-400 text-sm">
                        <li>Столетов 162</li>
                        <li><a href="tel:+359899125775" class="hover:text-accent-400 transition-colors">+359 899 125 775</a></li>
                        <li><a href="mailto:stanchev_sin2025@abv.bg" class="hover:text-accent-400 transition-colors">stanchev_sin2025@abv.bg</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider"><?php echo e(__('Следвайте ни')); ?></h4>
                    <p class="text-slate-400 text-sm mb-4">
                        <?php echo e(__('Свържете се с нас за професионални решения.')); ?>

                    </p>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center">
                <p class="text-slate-400 text-sm">© <?php echo e(date('Y')); ?> <span class="text-gradient font-semibold">СТАНЧЕВ И СИН 2025 ЕООД</span>. <?php echo e(__('Всички права запазени')); ?></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
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

        document.querySelectorAll('.card, section > div').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>

<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>
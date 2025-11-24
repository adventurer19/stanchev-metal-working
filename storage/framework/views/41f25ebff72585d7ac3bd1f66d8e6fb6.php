<?php $__env->startSection('title', __('Начало - Станчев и Син 2025 ЕООД')); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <?php
            $heroImages = [
                'metalworking-images/premium_photo-1664303560361-2b31c2d2c0ba.avif', // Заваръчни работи - динамична, впечатляваща
                'metalworking-images/photo-1598302936625-6075fbd98dd7.avif', // Шлайф с искри - много динамична
                '0110ADEA-670A-420F-9262-F13900A5F543.jpg',
                '01A2A6FA-E3AD-4212-B8BB-548B8E2AFAF3.jpg',
                '05A77770-4089-46E4-B8BB-195FCF56F2F2.jpg'
            ];
            $heroImage = $heroImages[array_rand($heroImages)];
        ?>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
        <img src="<?php echo e(asset($heroImage)); ?>" alt="<?php echo e(__('Металообработка')); ?>" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-radial"></div>
    </div>
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto animate-fade-in">
        <div class="inline-block mb-6 px-4 py-2 bg-accent-500/10 border border-accent-500/20 rounded-full">
            <span class="text-sm font-semibold text-accent-400"><?php echo e(__('От 2015 година')); ?></span>
        </div>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-8 text-white leading-tight text-shadow-lg">
            <?php echo e(__('Прецизна')); ?><br>
            <span class="text-gradient"><?php echo e(__('Металообработка')); ?></span>
        </h1>
        <p class="text-xl md:text-2xl text-slate-300 mb-12 leading-relaxed max-w-3xl mx-auto">
            <?php echo e(__('Индустриални решения с внимание към всеки детайл. Професионализъм, качество и прецизност във всяка работа.')); ?>

        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="<?php echo e(route('portfolio')); ?>" class="btn-primary">
                <?php echo e(__('Виж проектите')); ?>

            </a>
            <a href="<?php echo e(route('contact')); ?>" class="btn-secondary">
                <?php echo e(__('Свържи се с нас')); ?>

            </a>
        </div>
    </div>
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="py-20 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center card card-hover">
                <div class="text-5xl font-bold text-accent-500 mb-4">2015</div>
                <p class="text-slate-400 font-medium"><?php echo e(__('Година основаване')); ?></p>
            </div>
            <div class="text-center card card-hover">
                <div class="text-5xl font-bold text-accent-500 mb-4">100%</div>
                <p class="text-slate-400 font-medium"><?php echo e(__('Прецизност')); ?></p>
            </div>
            <div class="text-center card card-hover">
                <div class="text-5xl font-bold text-accent-500 mb-4">10+</div>
                <p class="text-slate-400 font-medium"><?php echo e(__('Години опит')); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- What We Do Section -->
<section class="py-32 bg-slate-950 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 class="section-title">
                <?php echo e(__('Какво правим')); ?>

            </h2>
            <p class="section-subtitle">
                <?php echo e(__('Предлагаме широк спектър от металообработващи услуги с високо качество и прецизност')); ?>

            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('metalworking-images/photo-1763926026024-2b294669e255.avif')); ?>" alt="<?php echo e(__('Материали')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('Всякакъв вид изработка')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Изработваме детайли от всякакъв вид и сложност според вашите спецификации.')); ?>

                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('metalworking-images/photo-1598302936625-6075fbd98dd7.avif')); ?>" alt="<?php echo e(__('Лазерно рязане')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('Лазерно рязане')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Прецизно лазерно рязане с модерно оборудване за високо качество.')); ?>

                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('metalworking-images/photo-1676646693434-8ee684e8ba49.avif')); ?>" alt="<?php echo e(__('CNC обработка')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('Изработка на детайли')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Прецизна изработка на метални детайли по индивидуални проекти.')); ?>

                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('images-crafting/IMG_3660.jpg')); ?>" alt="<?php echo e(__('Нишкова обработка')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('Нишкова обработка')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Специализирана нишкова обработка на метални компоненти.')); ?>

                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('images-crafting/IMG_3661.jpg')); ?>" alt="<?php echo e(__('Обемна ерозийна обработка')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('Обемна ерозийна обработка')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Обемна ерозийна обработка за серийно производство.')); ?>

                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('images-crafting/IMG_3662.jpg')); ?>" alt="<?php echo e(__('Стругова обработка')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('Стругова обработка')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Прецизна стругова обработка с модерни стругове за високо качество.')); ?>

                    </p>
                </div>
            </div>
            <div class="card card-hover group relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                    <img src="<?php echo e(asset('images-crafting/IMG_3659.jpeg')); ?>" alt="<?php echo e(__('CNC обработка')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-accent-500/20 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3"><?php echo e(__('CNC обработка')); ?></h3>
                    <p class="text-slate-400 leading-relaxed">
                        <?php echo e(__('Прецизна CNC обработка с модерни машини.')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Military Production Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="section-title text-left mb-6">
                    <?php echo e(__('Военна продукция')); ?>

                </h2>
                <p class="text-lg text-slate-400 leading-relaxed mb-6">
                    <?php echo e(__('Специализирани сме в производството на военни компоненти и детайли с най-високи стандарти за качество и прецизност.')); ?>

                </p>
                <p class="text-lg text-slate-400 leading-relaxed mb-8">
                    <?php echo e(__('Нашият опит в тази област ни позволява да отговорим на най-строгите изисквания и спецификации.')); ?>

                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="card card-hover text-center">
                        <div class="text-3xl font-bold text-accent-500 mb-2"><?php echo e(__('Високо качество')); ?></div>
                        <p class="text-slate-400 text-sm"><?php echo e(__('Строг контрол')); ?></p>
                    </div>
                    <div class="card card-hover text-center">
                        <div class="text-3xl font-bold text-accent-500 mb-2"><?php echo e(__('Прецизност')); ?></div>
                        <p class="text-slate-400 text-sm"><?php echo e(__('Точност в детайла')); ?></p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-square rounded-xl overflow-hidden border border-slate-800/50">
                    <img src="<?php echo e(asset('metalworking-images/premium_photo-1664303560361-2b31c2d2c0ba.avif')); ?>" alt="<?php echo e(__('Военна продукция')); ?>" class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-accent-500/20 rounded-full blur-3xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 class="section-title">
                <?php echo e(__('Партньори, които ни се доверяват')); ?>

            </h2>
            <p class="section-subtitle">
                <?php echo e(__('Работим с водещи компании в различни индустрии')); ?>

            </p>
        </div>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="card card-hover text-center">
                <div class="w-20 h-20 bg-accent-500/20 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Металик АД</h3>
                <p class="text-slate-400"><?php echo e(__('Доверен партньор')); ?></p>
            </div>
            <div class="card card-hover text-center">
                <div class="w-20 h-20 bg-accent-500/20 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">ЗГПУ Импулс</h3>
                <p class="text-slate-400"><?php echo e(__('Доверен партньор')); ?></p>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>
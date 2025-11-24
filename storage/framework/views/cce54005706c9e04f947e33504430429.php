<?php $__env->startSection('title', __('Портфолио - Станчев и Син 2025 ЕООД')); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative py-32 bg-slate-950 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h1 class="section-title">
                <?php echo e(__('Нашите проекти')); ?>

            </h1>
            <p class="section-subtitle">
                <?php echo e(__('Прегледайте нашите последни работи и проекти в областта на прецизната металообработка')); ?>

            </p>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
                $portfolioImages = [
                    ['src' => 'metalworking-images/premium_photo-1664303560361-2b31c2d2c0ba.avif', 'title' => __('Заваръчни работи')],
                    ['src' => 'metalworking-images/photo-1676646693434-8ee684e8ba49.avif', 'title' => __('CNC обработка')],
                    ['src' => 'metalworking-images/photo-1598302936625-6075fbd98dd7.avif', 'title' => __('Прецизна обработка')],
                    ['src' => 'images/7E4C5C99-94ED-4C09-8EA6-F40A6DD9B983.jpg', 'title' => __('Проект 1')],
                    ['src' => 'images/7F382442-63B7-47E1-BC85-C8F9FB2CF647.jpg', 'title' => __('Проект 2')],
                    ['src' => 'images/8663E575-10F0-4B03-A2FC-4ED541201235.jpg', 'title' => __('Проект 3')],
                    ['src' => 'images/9DE3E645-7B47-4B2A-BA04-BDB5E7D534F8.jpg', 'title' => __('Проект 4')],
                    ['src' => 'images/A82121DB-9C9C-4543-B2A2-FFD5C0727D62.jpg', 'title' => __('Проект 5')],
                    ['src' => 'images/B41A67FD-03C9-4A0B-8E4C-BA8C8F6CAD3B.jpg', 'title' => __('Проект 6')]
                ];
            ?>
            <?php $__currentLoopData = $portfolioImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group relative overflow-hidden rounded-xl border border-slate-800/50 bg-slate-900/50 cursor-pointer transform transition-all duration-500 hover:scale-[1.02] hover:border-accent-500/50 hover:shadow-2xl hover:shadow-accent-500/20">
                    <div class="aspect-square overflow-hidden">
                        <img src="<?php echo e(asset($img['src'])); ?>" alt="<?php echo e($img['title']); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <h3 class="text-white font-bold text-lg mb-2"><?php echo e($img['title']); ?></h3>
                            <p class="text-slate-300 text-sm"><?php echo e(__('Прецизна металообработка')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/portfolio.blade.php ENDPATH**/ ?>
@extends('layouts.app')

@section('title', __('Портфолио - Станчев и Син 2025 ЕООД'))

@section('content')
<!-- Hero Section -->
<section class="relative py-32 bg-slate-950 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h1 class="section-title">
                {{ __('Нашите проекти') }}
            </h1>
            <p class="section-subtitle">
                {{ __('Прегледайте нашите последни работи и проекти в областта на прецизната металообработка') }}
            </p>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-32 bg-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $portfolioImages = [
                    ['src' => 'images/0110ADEA-670A-420F-9262-F13900A5F543.jpg', 'title' => __('Проект 1')],
                    ['src' => 'images/01A2A6FA-E3AD-4212-B8BB-548B8E2AFAF3.jpg', 'title' => __('Проект 2')],
                    ['src' => 'images/05A77770-4089-46E4-B8BB-195FCF56F2F2.jpg', 'title' => __('Проект 3')],
                    ['src' => 'images/25EE9F16-6B80-44A1-B81E-6EE05E1DC782.jpg', 'title' => __('Проект 4')],
                    ['src' => 'images/36070E53-F178-40B1-AED2-C3081E5832BE.jpg', 'title' => __('Проект 5')],
                    ['src' => 'images/4072F7BC-9D87-482F-9A07-99157C645FAF.jpg', 'title' => __('Проект 6')],
                    ['src' => 'images/6A9C79BF-6A9D-4B5A-9E09-7EC87669B3A9.jpg', 'title' => __('Проект 7')],
                    ['src' => 'images/7E4C5C99-94ED-4C09-8EA6-F40A6DD9B983.jpg', 'title' => __('Проект 8')],
                    ['src' => 'images/7F382442-63B7-47E1-BC85-C8F9FB2CF647.jpg', 'title' => __('Проект 9')],
                    ['src' => 'images/8663E575-10F0-4B03-A2FC-4ED541201235.jpg', 'title' => __('Проект 10')],
                    ['src' => 'images/9DE3E645-7B47-4B2A-BA04-BDB5E7D534F8.jpg', 'title' => __('Проект 11')],
                    ['src' => 'images/A82121DB-9C9C-4543-B2A2-FFD5C0727D62.jpg', 'title' => __('Проект 12')],
                    ['src' => 'images/B41A67FD-03C9-4A0B-8E4C-BA8C8F6CAD3B.jpg', 'title' => __('Проект 13')],
                    ['src' => 'images/C58DCE5D-6BCE-4CB6-96E2-A04FDA3027D7.jpg', 'title' => __('Проект 14')],
                    ['src' => 'images/CDA143E3-5ABD-482A-9E5B-D078EBB9C879.jpg', 'title' => __('Проект 15')],
                    ['src' => 'images/CFB01630-25AE-46E3-9F84-DE90CC4C3786.jpg', 'title' => __('Проект 16')]
                ];
            @endphp
            @foreach($portfolioImages as $index => $img)
                <div class="card card-hover group relative overflow-hidden p-0 cursor-pointer">
                    <!-- Image Container -->
                    <div class="aspect-square overflow-hidden relative">
                        <img src="{{ asset($img['src']) }}" alt="{{ $img['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        
                        <!-- Background image effect -->
                        <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                            <img src="{{ asset($img['src']) }}" alt="" class="w-full h-full object-cover blur-xl scale-110">
                        </div>
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-500"></div>
                        
                        <!-- Content on Hover -->
                        <div class="absolute inset-0 flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-500">
                            <div class="relative z-10">
                                <div class="w-12 h-12 bg-accent-500/20 rounded-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-500">
                                    <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-white font-bold text-xl mb-2">{{ $img['title'] }}</h3>
                                <p class="text-slate-300 text-sm">{{ __('Прецизна металообработка') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bottom Info Bar (always visible) -->
                    <div class="p-4 bg-slate-900/80 backdrop-blur-sm border-t border-slate-800/50">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white font-semibold text-base mb-1">{{ $img['title'] }}</h3>
                                <p class="text-slate-400 text-xs">{{ __('Металообработка') }}</p>
                            </div>
                            <svg class="w-5 h-5 text-slate-500 group-hover:text-accent-500 transform group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection


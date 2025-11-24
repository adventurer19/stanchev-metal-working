<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Прецизна металообработка и индустриални решения в България">
    <title>@yield('title', 'ВИКТОР-КММ ООД - Прецизна металообработка')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-950 text-slate-100">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 glass border-b border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <a href="#home" class="text-2xl font-bold text-white hover:text-accent-400 transition-colors duration-300">
                        <span class="text-gradient">ВИКТОР-КММ</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#home" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Начало') }}</a>
                    <a href="#craft" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('За нас') }}</a>
                    <a href="#portfolio" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Портфолио') }}</a>
                    <a href="#why-us" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Защо ние') }}</a>
                    <a href="#contact" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Контакти') }}</a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-1 bg-slate-900/50 rounded-lg p-1 border border-slate-800">
                        <a href="{{ route('locale', 'bg') }}" class="px-3 py-1.5 text-xs font-medium rounded-md transition-all duration-300 {{ app()->getLocale() === 'bg' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/30' : 'text-slate-400 hover:text-slate-200' }}">БГ</a>
                        <a href="{{ route('locale', 'en') }}" class="px-3 py-1.5 text-xs font-medium rounded-md transition-all duration-300 {{ app()->getLocale() === 'en' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/30' : 'text-slate-400 hover:text-slate-200' }}">EN</a>
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
                <a href="#home" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Начало') }}</a>
                <a href="#craft" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('За нас') }}</a>
                <a href="#portfolio" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Портфолио') }}</a>
                <a href="#why-us" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Защо ние') }}</a>
                <a href="#contact" class="block px-4 py-2 text-slate-300 hover:text-white hover:bg-slate-800/50 rounded-lg transition-all duration-300">{{ __('Контакти') }}</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 z-0">
            @php
                $heroImages = [
                    '0110ADEA-670A-420F-9262-F13900A5F543.jpg',
                    '01A2A6FA-E3AD-4212-B8BB-548B8E2AFAF3.jpg',
                    '05A77770-4089-46E4-B8BB-195FCF56F2F2.jpg'
                ];
                $heroImage = $heroImages[array_rand($heroImages)];
            @endphp
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
            <img src="{{ asset('images/' . $heroImage) }}" alt="Metalworking" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-radial"></div>
        </div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto animate-fade-in">
            <div class="inline-block mb-6 px-4 py-2 bg-accent-500/10 border border-accent-500/20 rounded-full">
                <span class="text-sm font-semibold text-accent-400">{{ __('От 2007 година') }}</span>
            </div>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-8 text-white leading-tight text-shadow-lg">
                {{ __('Прецизна') }}<br>
                <span class="text-gradient">{{ __('Металообработка') }}</span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-300 mb-12 leading-relaxed max-w-3xl mx-auto">
                {{ __('Индустриални решения с внимание към всеки детайл. Професионализъм, качество и прецизност във всяка работа.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#portfolio" class="btn-primary">
                    {{ __('Виж проектите') }}
                </a>
                <a href="#contact" class="btn-secondary">
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

    <!-- Our Craft & Philosophy Section -->
    <section id="craft" class="py-32 bg-slate-950 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="section-title">
                    {{ __('Нашето майсторство') }}
                </h2>
                <p class="section-subtitle">
                    {{ __('Специализирани сме в прецизна металообработка, като предоставяме персонализирани услуги и продукти с високо качество и внимание към детайла.') }}
                </p>
            </div>
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="space-y-6">
                    <div class="card card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ __('Прецизност и качество') }}</h3>
                                <p class="text-slate-400 leading-relaxed">
                                    {{ __('Всяка детайл е изработен с внимание към перфектността. Използваме модерни технологии и строг контрол на качеството.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
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
                            <div class="w-12 h-12 bg-accent-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
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
                <div class="grid grid-cols-2 gap-4">
                    @php
                        $craftImages = array_slice([
                            '25EE9F16-6B80-44A1-B81E-6EE05E1DC782.jpg',
                            '36070E53-F178-40B1-AED2-C3081E5832BE.jpg',
                            '4072F7BC-9D87-482F-9A07-99157C645FAF.jpg',
                            '6A9C79BF-6A9D-4B5A-9E09-7EC87669B3A9.jpg'
                        ], 0, 4);
                    @endphp
                    @foreach($craftImages as $index => $img)
                        <div class="{{ $index === 0 ? 'col-span-2' : '' }} group relative overflow-hidden rounded-xl border border-slate-800/50 hover:border-accent-500/50 transition-all duration-500">
                            <div class="aspect-square overflow-hidden">
                                <img src="{{ asset('images/' . $img) }}" alt="Craft {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center card card-hover">
                    <div class="text-5xl font-bold text-accent-500 mb-4">2007</div>
                    <p class="text-slate-400 font-medium">{{ __('Година основаване') }}</p>
                </div>
                <div class="text-center card card-hover">
                    <div class="text-5xl font-bold text-accent-500 mb-4">100%</div>
                    <p class="text-slate-400 font-medium">{{ __('Прецизност') }}</p>
                </div>
                <div class="text-center card card-hover">
                    <div class="text-5xl font-bold text-accent-500 mb-4">17+</div>
                    <p class="text-slate-400 font-medium">{{ __('Години опит') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-32 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="section-title">
                    {{ __('Нашите проекти') }}
                </h2>
                <p class="section-subtitle">
                    {{ __('Прегледайте нашите последни работи и проекти в областта на прецизната металообработка') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $portfolioImages = [
                        '7E4C5C99-94ED-4C09-8EA6-F40A6DD9B983.jpg',
                        '7F382442-63B7-47E1-BC85-C8F9FB2CF647.jpg',
                        '8663E575-10F0-4B03-A2FC-4ED541201235.jpg',
                        '9DE3E645-7B47-4B2A-BA04-BDB5E7D534F8.jpg',
                        'A82121DB-9C9C-4543-B2A2-FFD5C0727D62.jpg',
                        'B41A67FD-03C9-4A0B-8E4C-BA8C8F6CAD3B.jpg',
                        'C58DCE5D-6BCE-4CB6-96E2-A04FDA3027D7.jpg',
                        'CDA143E3-5ABD-482A-9E5B-D078EBB9C879.jpg',
                        'CFB01630-25AE-46E3-9F84-DE90CC4C3786.jpg'
                    ];
                @endphp
                @foreach($portfolioImages as $index => $img)
                    <div class="group relative overflow-hidden rounded-xl border border-slate-800/50 bg-slate-900/50 cursor-pointer transform transition-all duration-500 hover:scale-[1.02] hover:border-accent-500/50 hover:shadow-2xl hover:shadow-accent-500/20">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ asset('images/' . $img) }}" alt="Project {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <h3 class="text-white font-bold text-lg mb-2">{{ __('Проект') }} {{ $index + 1 }}</h3>
                                <p class="text-slate-300 text-sm">{{ __('Прецизна металообработка') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-us" class="py-32 bg-slate-950 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="section-title">
                    {{ __('Защо да изберете нас?') }}
                </h2>
                <p class="section-subtitle">
                    {{ __('Разбираме, че успехът на вашия бизнес зависи от качеството и надеждността на вашите партньори.') }}
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card card-hover text-center">
                    <div class="w-20 h-20 bg-accent-500/20 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-10 h-10 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ __('Прецизност') }}</h3>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('Всяка детайл е изработен с внимание към перфектността и качеството.') }}
                    </p>
                </div>
                <div class="card card-hover text-center">
                    <div class="w-20 h-20 bg-accent-500/20 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-10 h-10 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ __('Модерно оборудване') }}</h3>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('Работим с най-модерните технологии и машини за най-добри резултати.') }}
                    </p>
                </div>
                <div class="card card-hover text-center">
                    <div class="w-20 h-20 bg-accent-500/20 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-10 h-10 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ __('Опитен екип') }}</h3>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('Нашият екип има дългогодишен опит в металообработката.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-32 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="section-title">
                    {{ __('Свържете се с нас') }}
                </h2>
                <p class="section-subtitle">
                    {{ __('Готови сте да направите следващата стъпка? Нашият екип е тук, за да отговори на вашите нужди.') }}
                </p>
            </div>
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="card">
                    <form action="{{ route('contact') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Име') }}</label>
                            <input type="text" id="name" name="name" required 
                                   class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Имейл') }}</label>
                            <input type="email" id="email" name="email" required 
                                   class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Телефон') }}</label>
                            <input type="tel" id="phone" name="phone" 
                                   class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold text-slate-300 mb-2">{{ __('Съобщение') }}</label>
                            <textarea id="message" name="message" rows="5" required 
                                      class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700 rounded-lg text-white placeholder-slate-500 focus:outline-none focus:border-accent-500 focus:ring-2 focus:ring-accent-500/20 transition-all duration-300 resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full btn-primary">
                            {{ __('Изпрати съобщение') }}
                        </button>
                    </form>
                </div>
                <div class="space-y-8">
                    <div class="card">
                        <h3 class="text-2xl font-bold text-white mb-8">{{ __('Контактна информация') }}</h3>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-accent-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-300 font-semibold mb-1">{{ __('Адрес') }}</p>
                                    <p class="text-slate-400">гр. Габрово, бул. ХЕМУС, 23, ет. 7</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-accent-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-300 font-semibold mb-1">{{ __('Телефон') }}</p>
                                    <a href="tel:+359899125775" class="text-accent-400 hover:text-accent-300 transition-colors duration-300">+359 899 125 775</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-14 h-14 bg-accent-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-300 font-semibold mb-1">{{ __('Имейл') }}</p>
                                    <a href="mailto:contact@viktor-kmm.com" class="text-accent-400 hover:text-accent-300 transition-colors duration-300">contact@viktor-kmm.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800/50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-slate-400 mb-2">© {{ date('Y') }} <span class="text-gradient font-semibold">ВИКТОР-КММ ООД</span>. {{ __('Всички права запазени') }}</p>
                <p class="text-slate-500 text-sm">{{ __('Прецизна металообработка и индустриални решения') }}</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

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

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Детайли на запитване | Станчев и Син</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: linear-gradient(to bottom, #f8fafc 0%, #e2e8f0 100%); }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-900">Детайли на запитване</h1>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center gap-2 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Обратно към списъка
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" 
                                class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition">
                            Изход
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Status Badge -->
            <div class="mb-6">
                @if($submission->is_read)
                    <span class="px-4 py-2 inline-flex text-sm font-semibold rounded-full bg-green-100 text-green-700">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Прочетено
                    </span>
                @else
                    <span class="px-4 py-2 inline-flex text-sm font-semibold rounded-full bg-amber-100 text-amber-700">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Непрочетено
                    </span>
                @endif
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">{{ $submission->name }}</h2>
                                <p class="text-blue-100 text-sm">{{ $submission->created_at->format('d F Y в H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="px-6 py-6 border-b border-gray-100">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Контактна информация</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-2">
                                Имейл адрес
                            </label>
                            <a href="mailto:{{ $submission->email }}" 
                               class="flex items-center gap-3 px-4 py-3 bg-gray-50 rounded-lg text-blue-600 hover:bg-blue-50 transition group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="font-medium">{{ $submission->email }}</span>
                            </a>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-2">
                                Телефонен номер
                            </label>
                            @if($submission->phone)
                                <a href="tel:{{ $submission->phone }}" 
                                   class="flex items-center gap-3 px-4 py-3 bg-gray-50 rounded-lg text-blue-600 hover:bg-blue-50 transition group">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span class="font-medium">{{ $submission->phone }}</span>
                                </a>
                            @else
                                <div class="flex items-center gap-3 px-4 py-3 bg-gray-50 rounded-lg text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                    </svg>
                                    <span class="font-medium">Не е посочен</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="px-6 py-6 border-b border-gray-100">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Съобщение</h3>
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <p class="text-gray-900 text-base leading-relaxed whitespace-pre-wrap">{{ $submission->message }}</p>
                    </div>
                </div>

                <!-- Meta Info -->
                <div class="px-6 py-4 bg-gray-50 text-sm">
                    <div class="flex items-center justify-between text-gray-500">
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                                <span>IP: {{ $submission->ip_address ?? 'Неизвестен' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $submission->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-white border-t border-gray-100 flex gap-3">
                    @if(!$submission->is_read)
                        <form method="POST" action="{{ route('admin.submission.mark-read', $submission->id) }}">
                            @csrf
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Маркирай като прочетено
                            </button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('admin.submission.delete', $submission->id) }}" 
                          onsubmit="return confirm('Сигурни ли сте, че искате да изтриете това запитване?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 px-5 py-2.5 rounded-lg text-sm font-medium transition border border-red-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Изтрий запитване
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
    <!-- Header -->
    <header class="bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Детайли на запитване</h1>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="text-cyan-500 hover:text-cyan-400">
                    ← Обратно към списъка
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-200">
                        Изход
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Status Badge -->
            <div class="mb-6">
                @if($submission->is_read)
                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-500/20 text-green-500">
                        ✓ Прочетено
                    </span>
                @else
                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-500/20 text-yellow-500">
                        ⚠ Непрочетено
                    </span>
                @endif
            </div>

            <!-- Main Card -->
            <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-white">{{ $submission->name }}</h2>
                        <span class="text-white/80 text-sm">
                            {{ $submission->created_at->format('d.m.Y в H:i') }}
                        </span>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="px-6 py-6 border-b border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 text-sm font-bold mb-2">
                                Имейл
                            </label>
                            <a href="mailto:{{ $submission->email }}" 
                               class="text-cyan-500 hover:text-cyan-400 text-lg flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                {{ $submission->email }}
                            </a>
                        </div>

                        <div>
                            <label class="block text-gray-400 text-sm font-bold mb-2">
                                Телефон
                            </label>
                            @if($submission->phone)
                                <a href="tel:{{ $submission->phone }}" 
                                   class="text-cyan-500 hover:text-cyan-400 text-lg flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    {{ $submission->phone }}
                                </a>
                            @else
                                <span class="text-gray-500 text-lg">Не е посочен</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div class="px-6 py-6">
                    <label class="block text-gray-400 text-sm font-bold mb-3">
                        Съобщение
                    </label>
                    <div class="bg-gray-900 rounded-lg p-4 border border-gray-700">
                        <p class="text-white text-lg leading-relaxed whitespace-pre-wrap">{{ $submission->message }}</p>
                    </div>
                </div>

                <!-- Meta Info -->
                <div class="px-6 py-4 bg-gray-900 border-t border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-400">IP адрес:</span>
                            <span class="text-gray-300 ml-2">{{ $submission->ip_address ?? 'Неизвестен' }}</span>
                        </div>
                        <div>
                            <span class="text-gray-400">Изпратено преди:</span>
                            <span class="text-gray-300 ml-2">{{ $submission->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-gray-800 border-t border-gray-700 flex gap-4">
                    @if(!$submission->is_read)
                        <form method="POST" action="{{ route('admin.submission.mark-read', $submission->id) }}">
                            @csrf
                            <button type="submit" 
                                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded transition duration-200">
                                Маркирай като прочетено
                            </button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('admin.submission.delete', $submission->id) }}" 
                          onsubmit="return confirm('Сигурни ли сте, че искате да изтриете това запитване?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded transition duration-200">
                            Изтрий запитване
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

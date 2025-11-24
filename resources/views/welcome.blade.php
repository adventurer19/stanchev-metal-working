<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 128 128" class="w-16 h-16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M78.733 18.667c-1.707 0-3.413.32-5.013.96L38.4 33.28c-1.6.64-2.987 1.707-4.053 3.093-1.067 1.387-1.707 2.987-1.92 4.8-.213 1.813.107 3.627.853 5.333l-4.8 11.52c-.853 2.027-1.067 4.267-.533 6.4.533 2.133 1.707 4.053 3.413 5.44l8.96 6.827-8.96 6.827c-1.707 1.387-2.88 3.307-3.413 5.44-.533 2.133-.32 4.373.533 6.4l4.8 11.52c-.747 1.707-.96 3.52-.853 5.333.213 1.813.853 3.413 1.92 4.8 1.067 1.387 2.453 2.453 4.053 3.093l35.52 13.653c3.2 1.28 6.827.747 9.6-1.387 2.773-2.133 4.373-5.44 4.373-8.96V28.8c0-3.52-1.6-6.827-4.373-8.96-2.773-2.133-6.4-2.667-9.6-1.387z" fill="#FF2D20"/>
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-black/80 flex flex-col gap-6 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Documentation</h2>
                                </div>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether you're a beginner or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                </p>
                            </div>
                        </a>

                        <a href="https://laracasts.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-black/80 flex flex-col gap-6 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V6a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3m-16.5 0a3 3 0 00-3 3v3a3 3 0 003 3h13.5a3 3 0 003-3v-3a3 3 0 00-3-3m-16.5 0h13.5" />
                                    </svg>
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Laracasts</h2>
                                </div>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


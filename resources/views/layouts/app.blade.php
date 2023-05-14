<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- LEEMOS DE FORMA LOCAL Y SE SELECCIONARA EL MODO OBSCURO SI ESTA ACTIVADO --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    @livewireStyles
</head>

<body class="antialiased">
    <div class="bg-white dark:bg-gray-900">

        {{ $navbar }}

        <main>
            <div class="min-h-screen p-4 ">
                <div class="px-4 py-2 border-2 border-gray-200 border-b rounded-lg dark:border-gray-700 mt-16">

                    {{-- 
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            </div>
                            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                                </div>
                                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                                </div>
                                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                                </div>
                                <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                    <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
                            </div>
                        </div> 
                    --}}
                    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-800 from-sky-700">
                            {{ $title }}
                    </h1>

                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>

    @livewireScripts
</body>

</html>

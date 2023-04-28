<nav
    class="fixed top-0 z-50 w-full  border-b  dark:border-gray-700 bg-gray-50 border-gray-200 px-2 sm:px-4 py-3 dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        {{-- Logotipo --}}
        <a href="/" class="flex items-center">
            <img src="https://images.vexels.com/media/users/3/301498/isolated/lists/ae95c7665b5f3a7f747a2c7312a6a66c-alfabeto-de-la-letra-h-de-la-naturaleza-tropical.png"
                class="h-6 mr-3 sm:h-9" alt="Logo" />
            <span
                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-sky-500 to-orange-400">
                LA HUATULQUEÑA
            </span>
        </a>

        <div class="flex">
            {{-- Login y registro --}}
            @if (Route::has('auth.login'))
                <a href="{{ route('auth.login') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Iniciar Sesion
                </a>
            @endif
            
            {{-- Modo Oscuro --}}
            <button id="theme-toggle" type="button"
                class="ml-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 md:ml-4">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

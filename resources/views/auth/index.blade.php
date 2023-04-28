<x-guest>
    <x-slot:navbar>
        <x-navbar.page />
    </x-slot>
 
    <div class="mt-12 pt-3">
        <section class="bg-gray-white dark:bg-gray-800 px-6 pt-36 pb-36">
            <div class="flex w-full max-w-sm mx-auto overflow-hidden rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
                <div class="hidden bg-cover lg:block lg:w-1/2"
                    style="background-image: url('https://media.admagazine.com/photos/618a5d11532cae908aaf27ab/master/w_1600%2Cc_limit/96644.jpg');">
                </div>
    
                <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
                    <a href="/" class="flex ml-2 md:mr-24">
                        <img src="{{ Storage::url('public/images/logo.png') }}" class="h-8 mr-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-sky-500 to-orange-400">
                            LA HUATULQUEÑA
                        </span>
                    </a>
    
                    <p class="text-xl mt-2 text-gray-600 dark:text-gray-200">
                        ¡Bienvenido de nuevo!
                    </p>
                    {{-- Division --}}
                    <div class="flex items-center justify-between mt-4">
                        <span class="w-full border-b dark:border-gray-600 "></span>
                    </div>
    
                    <form class="space-y-4 mt-4 md:space-y-6" action="{{ route('auth.authenticate') }}" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Usuario</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Mi usuario" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">¿Se te
                                olvidó tu contraseña?</a>
                        </div>
    
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar
                            Sesión</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-guest>
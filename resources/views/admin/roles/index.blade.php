<x-app>
    @if (session('alert-rol'))
        <x-alert.success>
            {{ session('alert-rol') }}
        </x-alert.success>
    @endif

    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Roles
    </x-slot:title>
    
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-screen-2xl ">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Buscar Rol" required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Agregar
                        </button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                Acciones
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <div class="grid grid-cols-4 gap-4 p-4">
                        @foreach ($roles as $rol)
                            <div class="max-w-sm rounded-lg shadow bg-green-600">
                                <div class="w-full max-w-sm p-2">
                                    <div class="flex items-center justify-between mb-4">
                                        <h5 class=" text-xl  font-bold tracking-tight text-white ">
                                            {{ $rol['nombre'] }}
                                        </h5>
                                        <button id="{{ $rol['id'] }}-dropdown-button"
                                            data-dropdown-toggle="{{ $rol['id'] }}-dropdown"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-white hover:text-gray-800 rounded-lg focus:outline-none"
                                            type="button">
                                            <svg class="w-8 h-6" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                    d="M10.5 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <button type="button" data-drawer-target="drawer-read-rol-{{ $rol['id'] }}-advanced"
                                    data-drawer-show="drawer-read-rol-{{ $rol['id'] }}-advanced"
                                    aria-controls="drawer-read-rol-{{ $rol['id'] }}-advanced"
                                    class="block w-full p-2 h-56 bg-green-500 hover:bg-green-400 border border-gray-200 rounded-lg shadow dark:border-gray-700">
                                    <h5 class="text-sm  tracking-tight text-white">
                                        Presiona aqui para visualizar la lista de {{ $rol['nombre'] }}
                                    </h5>
                                    <figure
                                        class="mt-2 relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                        <img class="rounded-lg h-28 w-28 mx-auto"
                                            src="https://cdn-icons-png.flaticon.com/512/10076/10076088.png"
                                            alt="rol">
                                    </figure>
                                </button>
                            </div>

                            <div id="{{ $rol['id'] }}-dropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="{{ $rol['id'] }}-dropdown-button">
                                    <li>
                                        {{-- boton de modal edit --}}
                                        <button id="edit{{ $rol['id'] }}ModalButton" type="button"
                                            class=" w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Editar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->

    <x-modal.create>
        <x-slot:modulo>
            Rol
        </x-slot:modulo>

        <x-slot:url>
            {{ route('roles.store') }}
        </x-slot:url>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del rol</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="">
            </div>
        </div>
    </x-modal.create>

    @foreach ($roles as $rol)
        <!-- Lista de empleados de cada rol -->
        <x-previews.roles>
            <x-slot:id>
                {{ $rol['id'] }}
            </x-slot:id>

            <x-slot:title>
                {{ $rol['nombre'] }}
            </x-slot:title>

            <x-slot:data>
                @forelse ($rol['empleados'] as $employee)
                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700  dark:border-gray-600">
                        <dt class="mb-3 flex items-center text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                </path>
                            </svg>

                            <span
                                class="mr-3 font-semibold leading-none text-gray-900 dark:text-white">{{ $employee['nombre'] . ' ' . $employee['apellidos'] }}
                            </span>

                            <span
                                class="text-xs font-medium inline-flex items-center px-2 py-1 rounded {{ $employee['status'] == '1' ? 'bg-green-100 text-green-800  dark:bg-green-200 dark:text-green-800' : 'bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-800' }} ">
                                {{ $employee['status'] == '1' ? 'Activo' : 'Inactivo' }}
                            </span>
                        </dt>

                        <span
                            class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z">
                                </path>
                            </svg>
                            {{ $employee['telefono'] }}
                        </span>
                    </div>
                @empty
                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700  dark:border-gray-600">
                        <dt class=" flex items-center text-gray-500 dark:text-gray-400">
                            <span
                                class="w-full text-xs font-medium inline-flex items-center p-2.5 rounded bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-800">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z">
                                    </path>
                                </svg>
                                Aun no hay empleados registrados con este rol
                            </span>
                        </dt>
                    </div>
                @endforelse
            </x-slot:data>
        </x-previews.roles>
    @endforeach
</x-app>

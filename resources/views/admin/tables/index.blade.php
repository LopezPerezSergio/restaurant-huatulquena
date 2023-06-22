<x-app>
    @if (session('alert-tables'))
    <x-alert.success>
        {{ session('alert-tables') }}
    </x-alert.success>
    @endif

    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Mesas
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
                                <input type="text" id="simple-search" placeholder="Buscar categoría" required=""
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
                        @foreach ($tables as $table)
                        <div class="max-w-sm rounded-lg shadow @if ($table['status'] == '1') bg-green-500 hover:bg-green-400 @endif {{-- Disponible --}}
                                            @if ($table['status'] == '2') bg-yellow-300 hover:bg-yellow-200  @endif {{-- Ocupado --}}
                                            @if ($table['status'] == '0') bg-gray-500 hover:bg-gray-400 @endif    {{-- Desactivo --}}
                                            rounded-lg shadow">
                            <div class="w-full max-w-sm p-2">
                                <div class="flex items-center justify-between mb-4">
                                    <h5 class=" text-xl  font-bold tracking-tight text-white ">
                                        {{ $table['nombre'] }}
                                    </h5>
                                    <button id="{{ $table['id'] }}-dropdown-button"
                                        data-dropdown-toggle="{{ $table['id'] }}-dropdown"
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

                            <button type="button" data-drawer-target="drawer-read-table-{{ $table['id'] }}-advanced"
                                data-drawer-show="drawer-read-table-{{ $table['id'] }}-advanced"
                                aria-controls="drawer-read-table-{{ $table['id'] }}-advanced"
                                class="block max-w-sm p-2 h-56 border  rounded-lg shadow">
                                <h5 class="text-sm  tracking-tight text-white">
                                    Presiona aqui para visualizar la mesa de {{ $table['nombre'] }}
                                </h5>
                                <figure
                                    class="mt-2 relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                    <img class="rounded-lg h-20 w-20 mx-auto"
                                        src="https://cdn-icons-png.flaticon.com/512/6724/6724239.png" alt="table">
                                </figure>
                            </button>
                        </div>

                        <div id="{{ $table['id'] }}-dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="{{ $table['id'] }}-dropdown-button">
                                <li>
                                    {{-- boton de modal edit --}}
                                    <button id="edit{{ $table['id'] }}ModalButton" type="button"
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
            Mesas
        </x-slot:modulo>

        <x-slot:url>
            {{ route('tables.store') }}
        </x-slot:url>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="">
            </div>
            <div>
                <label for="capacidad"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Numero de personas" required="">
            </div>
            <div class="mt-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input name="status" id="status" type="checkbox" value="1" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Estado
                    </span>
                </label>
            </div>
        </div>
    </x-modal.create>

    @foreach ($tables as $table)
    <x-modal.edit>
        <x-slot:url>
            {{ route('tables.update', $table['id']) }}
        </x-slot:url>

        <x-slot:id>
            {{ 'tables-' . $table['id'] }}
        </x-slot:id>

        <div>
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Nombre" required="" value="{{ $table['nombre'] }}">
        </div>
        <div>
            <label for="capacidad"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad</label>
            <input type="text" name="capacidad" id="capacidad"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Product brand" required="" value="{{ $table['capacidad'] }}">
        </div>
        <div class="mt-3">
            <label class="relative inline-flex items-center cursor-pointer">
                <input name="status" id="status" type="checkbox" value="1" class="sr-only peer" @if($table['status']=='1' || $table['status']=='2' ) checked @endif @if ($table['status']=='2' )
                    disabled @endif>
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Estado (Habilitar la mesa)
                </span>
            </label>
        </div>

    </x-modal.edit>
    @endforeach

</x-app>
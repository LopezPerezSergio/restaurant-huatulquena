<x-app>
    @if (session('alert-table'))
        <x-alert.success>
            {{ session('alert-table') }}
        </x-alert.success>
    @endif

    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Seleccion de mesa
    </x-slot:title>

    <section class="bg-gray-50 dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-screen-2xl ">
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
            </div>
            {{-- <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
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
                                <input type="text" id="simple-search" placeholder="Buscar Mesa" required=""
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
                    </div>
                    
                    
                </div> --}}

            <div class="overflow-x-auto">
                <div class="grid grid-cols-5 gap-4 p-">
                    {{-- Crear foreach de mesas --}}
                    @foreach ($tables as $table)
                        <div
                            class="max-w-sm rounded-lg shadow @if ($table['status'] == '1') bg-green-500 hover:bg-green-400 @endif {{-- Disponible --}}
                                            @if ($table['status'] == '2') bg-yellow-300 hover:bg-yellow-200 @endif {{-- Ocupado --}}
                                            @if ($table['status'] == '0') bg-gray-500 hover:bg-gray-400 @endif    {{-- Desactivo --}}
                                            rounded-lg shadow">
                            <div class="w-full max-w-sm p-2">
                                <div class="flex items-center justify-between mb-4">
                                    <h5 class=" text-xl  font-bold tracking-tight text-white ">
                                        {{ $table['nombre'] }}
                                    </h5>
                                    <button
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
                            <a href="{{ route('orders.show', $table['id']) }}">
                                <button type="button"
                                    class="block w-full p-2 h-56  border border-gray-200 rounded-lg shadow dark:border-gray-700">
                                    <h5 class="text-sm  tracking-tight text-white">
                                        Presiona aqui para iniciar la orden
                                    </h5>
                                    <figure
                                        class="mt-2 relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                        <img class="rounded-lg h-28 w-28 mx-auto"
                                            src="https://cdn-icons-png.flaticon.com/512/6724/6724239.png"
                                            alt="rol">
                                    </figure>
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- codificacion normal --}}
    <x-modal.create>
        <x-slot:modulo>
            Mesa
        </x-slot:modulo>

        <x-slot:url>
            {{ route('tables.store') }}
        </x-slot:url>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                    (s)</label>
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
            <div class="mt-5">
                <label class="my-3 relative inline-flex items-center cursor-pointer">
                    <input name="status" id="status" type="checkbox" value="1" class="sr-only peer ">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-4 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Estado (Activo - Inactivo)
                    </span>
                </label>
            </div>
        </div>
    </x-modal.create>

    {{-- Codificacion componente  mandar mesas al compooenente --}}
    {{-- @livewire('tables.pruebas', ['categories' => $categories, 'employees' => $employees, 'user' => $user, 'tables' => $tables , 'products' =>$products])
 --}}
</x-app>

<x-app>
    @if (session('alert-category'))
    <x-alert.success>
        {{ session('alert-category') }}
    </x-alert.success>
    @endif

    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Categorías
    </x-slot:title>

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-screen-2xl ">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4">
                    <div class="w-full md:w-1/2">
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
                </div>

                <div class="overflow-x-auto">
                    <div class="grid grid-cols-4 gap-4 p-4">
                        @foreach ($categories as $category)
                        <div class="max-w-sm rounded-lg shadow bg-green-600">
                            <div class="w-full max-w-sm p-2">
                                <div class="flex items-center justify-between mb-4">
                                    <h5 class=" text-xl  font-bold tracking-tight text-white ">
                                        {{ $category['nombre'] }}
                                    </h5>
                                    <button id="{{ $category['id'] }}-dropdown-button"
                                        data-dropdown-toggle="{{ $category['id'] }}-dropdown"
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

                            <button type="button"
                                data-drawer-target="drawer-read-category-{{ $category['id'] }}-advanced"
                                data-drawer-show="drawer-read-category-{{ $category['id'] }}-advanced"
                                aria-controls="drawer-read-category-{{ $category['id'] }}-advanced"
                                class="block w-full p-2 h-56 bg-green-500 hover:bg-green-400 border border-gray-200 rounded-lg shadow dark:border-gray-700">
                                <h5 class="text-sm  tracking-tight text-white">
                                    Presiona aqui para visualizar la lista de {{ $category['nombre'] }}
                                </h5>
                                <figure
                                    class="mt-2 relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                    <img class="rounded-lg h-20 w-20 mx-auto"
                                        src="https://cdn-icons-png.flaticon.com/512/6724/6724239.png" alt="category">
                                </figure>
                            </button>
                        </div>

                        {{--  <div id="{{ $category['id'] }}-dropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="{{ $category['id'] }}-dropdown-button">
                                <li>
                                    
                                    <button id="edit{{ $category['id'] }}ModalButton" type="button"
                                        class=" w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Editar
                                    </button>
                                </li>
                            </ul>
                        </div>  --}}
                                        <div id="{{ $category['id'] }}-dropdown"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="{{ $category['id'] }}-dropdown-button">
                                                <li>
                                                    {{-- boton de modal edit --}}
                                                    <button id="edit{{ $category['id'] }}ModalButton"
                                                        data-modal-toggle="edit{{ $category['id'] }}Modal"
                                                        type="button"
                                                        class=" w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        Editar
                                                    </button>
                                                </li>
                                            </ul>
                                            {{--  <div class="py-1">
                                                <a href="#"
                                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-red-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-red">Eliminar</a>
                                            </div>  --}}
                                        </div>


                                        <div id="{{ $category['id'] }}-dropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $category['id'] }}-dropdown-button">
                                            <li>
                                                {{-- boton de modal edit --}}
                                                <button id="edit{{ $category['id'] }}ModalButton"
                                                    data-modal-toggle="edit{{ $category['id'] }}Modal"
                                                    type="button"
                                                    class=" w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    Editar
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#"
                                                class="block py-2 px-4 text-sm text-red-700 hover:bg-red-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-red">Eliminar</a>
                                        </div>
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
            Categoría
        </x-slot:modulo>

        <x-slot:url>
            {{ route('categories.store') }}
        </x-slot:url>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la
                    categoría</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="" >
            </div>
        </div>
    </x-modal.create>

    @foreach($categories as $category)
    <x-previews.categories>
        <x-slot:id>
            {{ $category['id'] }}
        </x-slot:id>

        <x-slot:title>
            {{$category['nombre'] }}
        </x-slot:title>

        <x-slot:data>
            @forelse ($category['productos'] as $product)
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
                        class="mr-3 font-semibold leading-none text-gray-900 dark:text-white">{{ $product['nombre']  }}
                    </span>

                    <span
                        class="text-xs font-medium inline-flex items-center px-2 py-1 rounded {{ $product['status'] == '1' ? 'bg-green-100 text-green-800  dark:bg-green-200 dark:text-green-800' : 'bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-800' }} ">
                        {{ $product['status'] == '1' ? 'Activo' : 'Inactivo' }}
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
                    {{ $product['precio'] }}
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
                        Aun no hay productos registrados en esta categoria
                    </span>
                </dt>
            </div>
            @endforelse
        </x-slot:data>
    </x-previews.categories>

    {{--  <x-modal-edit>
        <x-slot name="modal">
            {{ $category['id'] }}
        </x-slot>
        <x-slot name="url">
            {{ route('categories.update', $category['id']) }}
        </x-slot>
        <x-slot name="title">
            Editar Categoría
        </x-slot>
        <div>
            <label for="nombre"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Nombre" required="" value="{{ $category['nombre'] }}">
        </div>
        <div></div>
    
        <x-modal-confirmation>
            <x-slot name="id">
                {{ $category['id'] }}
            </x-slot>

            <x-slot name="button">
                Editar Categoría
            </x-slot>

            <x-slot name="message_confirmation_modal">
                ¿Confirma que desea actualizar los datos de {{ $category['nombre'] }}?
            </x-slot>
        </x-modal-confirmation>
    </x-modal-edit>  --}}
    @endforeach

</x-app>
<div>
    <section x-data class="bg-gray-50 dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-screen-2xl ">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4">
                    <div class="w-full md:w-1/2">
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                {{-- Input que esta conectado con la propiedad Search --}}
                                <input wire:model="search" type="text" id="simple-search" name="nombre"
                                    placeholder="Buscar producto ..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </div>
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
                        <button id="DropdownButtonFilters" data-dropdown-toggle="dropdown-filters"
                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="h-4 w-4 mr-1.5 -ml-1 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                    clip-rule="evenodd" />
                            </svg>
                            Opciones de Filtro
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- tabla de datos -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4" style="text-align: center">Nombre Producto</th>
                                <th scope="col" class="p-4" style="text-align: center">Familia</th>
                                <th scope="col" class="p-4" style="text-align: center">Cantidad</th>
                                <th scope="col" class="p-4" style="text-align: center">Unidad</th>
                                <th scope="col" class="p-4" style="text-align: center">Cant. Restante</th>
                                 <th scope="col" class="p-4">Estado</th> 
                                <th scope="col" class="p-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($filterProducts as $product)
                            <tr style="text-align: center" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <th class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product['nombre'] }}
                                </div>
                                </th>

                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$product['categoria']}}
                                    {{-- <span
                                    class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                    @if ($product['categoria'] == 'b')
                                        Bebidas
                                    @endif
                                    @if ($product['categoria'] == 'l')
                                        Licores
                                    @endif
                                    @if ($product['categoria'] == 'p')
                                        Proteína
                                    @endif
                                </span> --}}
                                    </div>
                                </th>

                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product['cantidad'] }}
                                </td>

                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                        {{$product['unidad']}}
                                    </span>
                                </td>

                                <td  class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$product['contador']}}
                                </td>

                                 <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        <div
                                            class="h-4 w-4 rounded-full inline-block mr-2 {{ $product['status'] == '1' ? 'bg-green-600 text-green-600' : 'bg-red-600 text-red-600' }}">
                                        </div>
                                        {{ $product['status'] == '1' ? 'Activo' : 'Inactivo' }}

                                    </div>
                                </td> 
                                
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('products.edit', $product['id']) }}"
                                            class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Editar
                                        </a>
                                        {{-- <button type="button"
                                            data-drawer-target="drawer-read-product-{{ $product['id'] }}-advanced"
                                            data-drawer-show="drawer-read-product-{{ $product['id'] }}-advanced"
                                            aria-controls="drawer-read-product-{{ $product['id'] }}-advanced"
                                            class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                            Ver
                                        </button> --}}

                                        {{--  <form method="post"
                                            action="{{ route('products.destroy', $product['id']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Borrar
                                            </button>
                                        </form>  --}}

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <td colspan="4" class="px-6 py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                No hay productos
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                ¿Esta seguro de su busqueda?
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Dropdown menu -->
    <div id="dropdown-filters"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="DropdownButtonFilters">
            <li>
                <button id="DropdownButtonCategories" data-dropdown-toggle="dropdown-filters-categories"
                    data-dropdown-placement="right-start" type="button"
                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Categoría<svg
                        aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="dropdown-filters-categories"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="DropdownButtonCategories">

                        @foreach ($inventory as $category)
                        @php
                            $categoryName = '';
                            if ($category['categoria'] == 'l') {
                                $categoryName = 'Licores';
                            } elseif ($category['categoria'] == 'p') {
                                $categoryName = 'Proteina';
                            } elseif ($category['categoria'] == 'b') {
                                $categoryName = 'Bebidas';
                            } 
                        @endphp
                        <li class="flex items-center">
                            <button type="button"
                                wire:click="$set('filter_category', '{{ $category['categoria'] }}')"
                                class="w-full flex items-center p-2 {{ $filter_category == $category['categoria'] ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <span class="ml-3">{{ $categoryName }}</span>
                            </button>
                        </li>
                    @endforeach
                    
                    </ul>
                </div>
            </li>
            <li>
                <button id="DropdownButtonStatus" data-dropdown-toggle="dropdown-filters-status"
                    data-dropdown-placement="right-start" type="button"
                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Estatus<svg
                        aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="dropdown-filters-status"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="DropdownButtonStatus">
                        <li class="flex items-center">
                            <button type="button" wire:click="$set('filter_status', '1')"
                                class="w-full flex items-center p-2 {{ $filter_status == '1' ? 'bg-gray-100 dark:bg-gray-700 text-gray-900  dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800' : 'text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <span class="ml-3">Activo</span>
                            </button>
                        </li>
                        <li class="flex items-center">
                            <button type="button" wire:click="$set('filter_status', '0')"
                                class="w-full flex items-center p-2 {{ $filter_status == '0' ? 'bg-gray-100 dark:bg-gray-700 text-gray-900  dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800' : 'text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <span class="ml-3">Inactivo</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="py-1">
            <button type="button" wire:click="clear"
                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <span class="ml-3">Eliminar filtros</span>
            </button>
        </div>
    </div>

</div>

<x-app>
    @if (session('alert-product'))
    <x-alert.success>
        {{ session('alert-product') }}
    </x-alert.success>
    @endif
    <x-slot:navbar>
        <x-navbar.siderbar />
        </x-slot>

        <x-slot:title>
            Productos
            </x-slot>

            {{-- Codificacion componente  --}}
            @livewire('tables.products', ['categories' => $categories, 'products' => $products])
            {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

            {{-- Codificacion create --}}
            <x-modal.create>
                <x-slot:modulo>
                    Producto
                </x-slot:modulo>

                <x-slot:url>
                    {{ route('products.store') }}
                </x-slot:url>

                <!-- formulario para nuevo -->
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="nombre"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nombre"
                            required="">
                    </div>
                    <div>
                        <label for="tamanio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tamaño</label>
                        <select id="tamanio" name="tamanio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Selecciona un tamaño</option>
                            <option value="S">Chico</option>
                            <option value="M">Mediano</option>
                            <option value="L">Grande</option>
                            <option value="XL">Familiar</option>
                        </select>
                    </div>
                    <div>
                        <label for="precio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input type="number" name="precio" id="precio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$999"
                            required="">
                    </div>

                    <div>
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Categoria</label>
                        <select id="categoria" name="categoria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Selecciona un categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="url_img_create"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Haga clic para cargar
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX.
                                            800x400px)</p>
                            </div>
                            <input id="url_img_create" name="url_img" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="image_create"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-solid rounded-lg  dark:bg-gray-700 dark:border-gray-600 ">
                            <figure class="mt-2 relative max-w-sm duration-300  filter ">
                                <img id="image_create" class="rounded-lg w-56 mx-auto"
                                    src="{{ Storage::url('public/images/base_image_productos.png') }}">
                            </figure>
                        </label>
                    </div>
                    <div class="my-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input name="status" id="status" type="checkbox" value="1" class="sr-only peer ">
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Estado (Activo - Inactivo)
                            </span>
                        </label>
                    </div>
                    <div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Agregar Producto
                        </button>
                    </div>
                </div>

            </x-modal.create>

            @foreach($products as $product)

                <x-modal.show>
                    <x-slot:id>
                        {{ 'product-' . $product['id'] }}
                    </x-slot:id>
                    <x-slot:name>
                        {{ $product['nombre'] }}
                    </x-slot:name>
                    <x-slot:filter>
                        {{ $product['categoriaName'] }}
                    </x-slot:filter>

                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nombre</dt>
                        <dd class="flex items-center text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                </path>
                            </svg>
                            {{ $product['nombre']  }}
                        </dd>
                    </div>
                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tamaño</dt>
                        <dd class="flex items-center text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                </path>
                            </svg>
                            {{ $product['tamanio']  }}
                        </dd>
                    </div>
                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Precio</dt>
                        <dd class="flex items-center text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                </path>
                            </svg>
                            {{ $product['precio']  }}
                        </dd>
                    </div>
                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Categoria</dt>
                        <dd class="flex items-center text-gray-500 dark:text-gray-400">

                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" fill="currentColor"
                                    d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z">
                                </path>
                            </svg>

                            {{ $product['categoriaName'] }}
                        </dd>
                    </div>
                    <div
                        class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Estado</dt>
                        <dd class="flex items-center text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                </path>
                            </svg>

                            
                            <span
                                class="w-full text-xs font-medium inline-flex items-center px-2 py-1 rounded {{ $product['status'] == '1' ? 'bg-green-100 text-green-800  dark:bg-green-200 dark:text-green-800' : 'bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-800' }} ">
                                {{ $product['status'] == '1' ? 'Activo' : 'Inactivo' }}
                            </span>
                        </dd>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Vendidos</dt>
                        <dd class="text-gray-500 dark:text-gray-400">
                            <span
                                class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z">
                                    </path>
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z">
                                    </path>
                                </svg>
                                {{ $product['contador'] }}
                            </span>
                        </dd>
                    </div>
                    <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Imagen</dt>
                        <dd class="text-gray-500 dark:text-gray-400">
                            <span
                                class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z">
                                    </path>
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z">
                                    </path>
                                </svg>
                                {{ $product['url_img'] }}
                            </span>
                        </dd>
                    </div>
                </x-modal.show>

                <x-modal.edit>
                    <x-slot:url>
                        {{ route('products.update', $product['id']) }}
                    </x-slot:url>

                    <x-slot:id>
                        {{ 'product-' . $product['id'] }}
                    </x-slot:id>

                    <!-- formulario para editar -->
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre"
                                required=""
                                value="{{ $product['nombre'] }}">
                        </div>
                        <div>
                            <label for="tamanio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tamaño</label>
                            <select id="tamanio" name="tamanio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Selecciona un tamaño</option>
                                <option value="S">Chico</option>
                                <option value="M">Mediano</option>
                                <option value="L">Grande</option>
                                <option value="XL">Familiar</option>
                            </select>
                        </div>
                        <div>
                            <label for="precio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                            <input type="number" name="precio" id="precio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="$999"
                                required=""
                                value="{{ $product['precio'] }}">
                        </div>

                        <div>
                            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Categoria</label>
                            <select id="categoria" name="categoria"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Selecciona un categoria</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="my-3">
                            <label class="relative inline-flex items-center cursor-pointer">
                            <input name="status" id="status" type="checkbox" value="1" class="sr-only peer"
                                @if ($product['status'] == '1') checked @endif>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Estado (Activo - Inactivo)
                                </span>
                            </label>
                        </div>
                    </div>

                </x-modal.edit>

            @endforeach
</x-app>
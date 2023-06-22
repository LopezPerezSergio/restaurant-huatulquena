<x-app>
    @if (session('alert-product'))
        <x-alert.success>
            {{ session('alert-product') }}
        </x-alert.success>
    @endif
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Producto: {{ $product['nombre'] }}
    </x-slot:title>

    <form action="{{ route('products.update', $product['id']) }}" method="POST" enctype="multipart/form-data"
        class=" max-w-4xl p-4 overflow-y-auto bg-white dark:bg-gray-800">
        @csrf
        @method('PUT')

        <div class="grid gap-4 mb-4 sm:grid-cols-2">

            {{-- Datos para la actualizacion --}}
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="" value="{{ $product['nombre'] }}">
            </div>
            <div>
                <label for="tamanio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tamaño</label>
                <select id="tamanio" name="tamanio"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Selecciona un tamaño</option>
                    <option value="S" @if ($product['tamanio'] == 'S') selected @endif>Chico</option>
                    <option value="M" @if ($product['tamanio'] == 'M') selected @endif>Mediano</option>
                    <option value="L" @if ($product['tamanio'] == 'L') selected @endif>Grande</option>
                    <option value="XL" @if ($product['tamanio'] == 'XL') selected @endif>Familiar</option>

                </select>
            </div>
            <div>
                <label for="precio"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input type="number" name="precio" id="precio"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="$999" required="" value="{{ $product['precio'] }}">
            </div>
            <div>
                <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Categoría</label>
                <select id="categoria" name="categoria"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecciona un categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @if ($category['nombre'] === $product['categoriaName']) selected @endif>
                            {{ $category['nombre'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-center w-full">
                <label for="url_img_update"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Haga
                                clic para cargar
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX.
                                    800x400px)</p>
                    </div>
                    <input id="url_img_update" name="url_img" type="file" class="hidden" accept="image/*"
                        value="{{ Storage::url($product['url_img']) }}" />
                </label>
            </div>
            <div class="flex items-center justify-center w-full">
                <label for="image_update"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-solid rounded-lg  dark:bg-gray-700 dark:border-gray-600 ">
                    <figure class="mt-2 relative max-w-sm duration-300  filter ">
                        <img id="image_update" class="rounded-lg w-56 mx-auto"
                            src="{{ Storage::url($product['url_img']) }}">
                    </figure>
                </label>
            </div>
            <div class="my-2">
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
        <div class="grid grid-cols-2 gap-4 mt-6 sm:w-1/2">

        </div>
        <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <button type="button" data-modal-target="update-product-{{ $product['id'] }}-modal"
                data-modal-toggle="update-product-{{ $product['id'] }}-modal"
                class="justify-center inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd" />
                </svg>
                Editar
            </button>
            <a href="{{ route('products.index') }}" type="button"
                class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                Descartar
            </a>
        </div>

        <!-- update Modal -->
        <div id="update-product-{{ $product['id'] }}-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full h-auto max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="update-product-{{ $product['id'] }}-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                            fill="none" stroke="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            ¿Esta seguro se editar los datos de este producto?</h3>
                        <button data-modal-toggle="update-product-{{ $product['id'] }}-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Si, continuar</button>
                        <button data-modal-toggle="update-product-{{ $product['id'] }}-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Codigo JS para interactuar con las imagenes y ver una previsualizacion --}}
    <script>
        /* funcion para crear */
        document.getElementById("url_img_update").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("image_update").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
</x-app>

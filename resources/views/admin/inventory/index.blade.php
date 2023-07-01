<x-app>
    @if (session('alert-inventory'))
        <x-alert.success>
            {{ session('alert-inventory') }}
        </x-alert.success>
    @endif
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Inventario
    </x-slot:title>

    {{-- Codificacion componente  --}}
    @livewire('inventory', ['inventory'=>$inventory, 'productos'=>$productos])
    {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

    {{-- Codificacion create --}}
    <x-modal.create>
        <x-slot:modulo>
            Producto
        </x-slot:modulo>

        <x-slot:url>
            {{ route('inventory.store') }}
        </x-slot:url>

        <x-slot:enctype>
            enctype="multipart/form-data"
        </x-slot:enctype>

        <!-- formulario para nuevo inventario -->
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="" pattern="^[A-ZÁÉÍÓÚÑ][A-Za-zÁÉÍÓÚáéíóúñ\s]+$">
                    @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="familia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría(Familia)</label>
                <select id="familia" name="familia" required
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 <option value="" disabled selected>Selecciona una Categoría</option>
                 <option value="p">Proteína</option>
                 <option value="l">Lícores</option>
                 <option value="b">Bebídas</option>
               </select>
            </div>

            <div>
                <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Cantidad
                </label>
                <input type="number" name="cantidad" id="cantidad"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                     placeholder="Cantidad" min="0" max="99999" pattern="[0-9]{1,5}" required>
                     @error('cantidad')
                     <span class="text-red-500 text-sm">{{ $message }}</span>
                 @enderror
             </div>

            <div>
                <label for="unidad"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Unidad
                </label>
                <input disabled id="unidad"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">              
            </div>
            
            <div>
                <label for="tituloSelect" id="tituloSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Seleccione los Productos que contienen
                </label>
                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" data-dropdown-placement="bottom"
                        class="text-white bg-gray-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                    Productos
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
            
                <!-- Dropdown menu -->
                <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                    <div class="p-3">
                        <label for="input-group-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="input-group-search"
                                   class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search Product">
                        </div>
                    </div>
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownSearchButton">
                        @foreach ($productos as $producto)
                        <li class="producto-item" data-categoria="{{ $producto['categoriaName'] }}">
                            <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="checkbox-item-{{ $producto['id'] }}" type="checkbox" value="{{ $producto['id'] }}"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-item-{{ $producto['id'] }}"
                                       class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $producto['nombre'] }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>    
        </div>
        <script>
            const selectCategoria = document.getElementById("familia");
            const inputUnidad = document.getElementById("unidad");
            const inputNombre = document.getElementById("nombre");
            const tituloSelect = document.getElementById("tituloSelect");
            const inputSearch = document.getElementById('input-group-search');
            const items = document.querySelectorAll('#dropdownSearch li');

                {{--  Para buscar  --}}
                inputSearch.addEventListener('input', function() {
                    const searchTerm = inputSearch.value.toLowerCase();

                    items.forEach(function(item) {
                        const label = item.querySelector('label');
                        const productName = label.textContent.toLowerCase();

                        if (productName.includes(searchTerm)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
                {{--  para pasar el nombre ingresado al titulo del dropdown   --}}
            inputNombre.addEventListener("input", function() {
                const nombreProducto = inputNombre.value.trim();
                tituloSelect.textContent = `Seleccione los Productos que contienen ${nombreProducto}`;
            });
            {{--  para poner la unidad de medida  --}}
            selectCategoria.addEventListener("change", function() {
              const categoriaSeleccionada = selectCategoria.value;
              
              if (categoriaSeleccionada === "p") {
                inputUnidad.value = "Kilos/Gramos";
              } else if (categoriaSeleccionada === "l") {
                inputUnidad.value = "SHOT";
              } else if (categoriaSeleccionada === "b") {
                inputUnidad.value = "Envase";
              } else {
                inputUnidad.value = "";
              }
            });

            {{--  PARA FILTRAR LOS PRODUCTOS MOSTRADOS  --}}
            document.addEventListener('DOMContentLoaded', function () {
                var familiaSelect = document.getElementById('familia');
                var productoItems = document.getElementsByClassName('producto-item');
        
                familiaSelect.addEventListener('change', function () {
                    var selectedOption = familiaSelect.value;
                    var categoria = '';
        
                    if (selectedOption === 'p') {
                        categoria = 'PLATILLO';
                    } else if (selectedOption === 'l' || selectedOption === 'b') {
                        categoria = 'BEBIDA';
                    }
        
                    for (var i = 0; i < productoItems.length; i++) {
                        var item = productoItems[i];
                        var itemCategoria = item.getAttribute('data-categoria');
        
                        if (itemCategoria === categoria) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });
            });
          </script>
    </x-modal.create>
</x-app>


{{--  <div>
    <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
        rol</label>
    <select multiple id="rol" name="rol" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        <option value="" disabled selected>Selecciona un rol</option>
        @foreach ($productos as $productosLista)
            <option value="{{ $productosLista['id'] }}">{{ $productosLista['nombre'] }}</option>
        @endforeach
    </select>
</div>  --}}
 {{--  <div>
            <label for="productos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona los productos</label>
            <div class="max-h-40 overflow-y-auto">
                @foreach ($productos as $producto)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" id="producto{{ $producto['id'] }}" name="productos[]" value="{{ $producto['id'] }}" class="form-checkbox h-4 w-4 text-primary-500 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="producto{{ $producto['id'] }}" class="ml-2">{{ $producto['nombre'] }}</label>
                    </div>
                @endforeach
            </div>
            </div>  --}}
            {{--  <select id="ubicacion" name="ubicacion" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Selecciona una Unidad</option>
            <option value="l">Litro(s)</option>
            <option value="k">Kilo(s)</option>
            <option value="p">Pieza(s)</option>
            <option value="e">Envase(s)</option>
          </select>  --}}
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
    @livewire('inventory', ['inventory'=>$inventory])
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
                <label for="familia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría(Familia)</label>
                <select id="ubicacion" name="ubicacion" required
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 <option value="" disabled selected>Selecciona una Categoría</option>
                 <option value="ce">Cerveza</option>
                 <option value="co">Congelados</option>
                 <option value="ca">Carnes</option>
                 <option value="ve">Verdura</option>
               </select>
            </div>
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
               <label for="ubicacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                 Unicación del Prodcuto
               </label>
               <select id="ubicacion" name="ubicacion" required
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 <option value="" disabled selected>Selecciona una ubicación</option>
                 <option value="a">Almacen</option>
                 <option value="r">Refrigerador</option>
                 <option value="c">Congelador</option>
                 <option value="b">Barra</option>
               </select>
             </div>
             
            <div>
                <label for="unidad"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Unidad
                </label>
                    <select id="ubicacion" name="ubicacion" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected>Selecciona una Unidad</option>
                    <option value="l">Litro(s)</option>
                    <option value="k">Kilo(s)</option>
                    <option value="p">Pieza(s)</option>
                    <option value="e">Envase(s)</option>
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
                <label for="costo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Costo por Unidad
                </label>
                <input type="number" name="costo" id="costo"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                     placeholder="Cantidad" min="0" max="99999" pattern="[0-9]{1,5}" required>
                     @error('costo')
                     <span class="text-red-500 text-sm">{{ $message }}</span>
                 @enderror
            </div>
            <div>
                <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Valor
                </label>
                <input name="valor" id="valor" readonly
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
        </div>
        <script>
            const cantidadInput = document.getElementById('cantidad');
            const costoInput = document.getElementById('costo');
            const valorInput = document.getElementById('valor');
        
            // Agregar event listeners para los cambios en cantidad y costo
            cantidadInput.addEventListener('input', calcularValor);
            costoInput.addEventListener('input', calcularValor);
        
            // Función para calcular el valor y actualizar el campo correspondiente
            function calcularValor() {
                const cantidad = cantidadInput.value;
                const costo = costoInput.value;
                const costoPorUnidad = cantidad * costo;
                valorInput.value = costoPorUnidad;
            }
        </script>
    </x-modal.create>
</x-app>

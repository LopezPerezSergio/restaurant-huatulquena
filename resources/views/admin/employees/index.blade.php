<x-app>
    @if (session('alert-employee'))
        <x-alert.success>
            {{ session('alert-employee') }}
        </x-alert.success>
    @endif
    
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Empleados
    </x-slot:title>

    {{-- Codificacion componente  --}}
    @livewire('tables.employees', ['list_roles' => $roles]) {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

    {{-- codificacion normal --}}
    <x-modal.create>
        <x-slot:modulo>
            Empleado
        </x-slot:modulo>

        <x-slot:url>
            {{ route('employees.store') }}
        </x-slot:url>

        <x-slot:form>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        (s)</label>
                    <input type="text" name="nombre" id="nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Nombre" required="">
                </div>
                <div>
                    <label for="apellidos"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Apellidos" required="">
                </div>
                <div>
                    <label for="telefono"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                    <input type="tel" name="telefono" id="telefono"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Telefono" required="" pattern="[0-9]{10}">
                </div>
                <div>
                    <label for="codigoAcceso"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo de
                        Acceso</label>
                    <input type="text" name="codigoAcceso" id="codigoAcceso"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Codigo de Acceso" required="">
                </div>
                <div>
                    <label for="rol"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
                        rol</label>
                    <select id="rol" name="rol"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected>Selecciona un rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-4 md:gap-6 sm:grid-cols-2">
                    <div>
                        <label for="sueldo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sueldo/Dia</label>
                        <input type="number" name="sueldo" id="sueldo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$299" required="">
                    </div>
                    <div>
                        <label for="comision"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comision</label>
                        <input type="number" name="comision" id="comision"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$299" required="">
                    </div>
                </div>

                <div>
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
        </x-slot:form>
    </x-modal.create>
</x-app>

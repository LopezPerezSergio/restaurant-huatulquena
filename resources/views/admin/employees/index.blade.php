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
    @livewire('tables.employees', ['roles' => $roles, 'employees' => $employees]) {{-- Llamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

    {{-- codificacion normal --}}
    <x-modal.create>
        <x-slot:modulo>
            Empleado
        </x-slot:modulo>
    
        <x-slot:url>
            {{ route('employees.store') }}
        </x-slot:url>
    
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre (s)</label>
                    <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ej. Luis Alfredo" required="" pattern="^[A-ZÁÉÍÓÚÑ][A-Za-zÁÉÍÓÚáéíóúñ\s]+$">
                    @error('nombre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ej. Ayala Lopez" required="" pattern="^[A-ZÁÉÍÓÚ][A-ZÁÉÍÓÚáéíóúa-z ,]+$" >
                    @error('apellidos')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ej. 9517854215" required="" pattern="[0-9]{10}">
                    @error('telefono')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="codigoAcceso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo de Acceso</label>
                    <input type="text" name="codigoAcceso" id="codigoAcceso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ej. 1234" required="" pattern="[0-9]{4}">
                    @error('codigoAcceso')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
                        rol</label>
                    <select id="rol" name="rol"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected>Selecciona un rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol['id'] }}">{{ $rol['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="sueldo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sueldo</label>
                    <input type="text" name="sueldo" id="sueldo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ej. 200 o 200.00" pattern="^(?!-)([0-9]{1,4}(\.[0-9]{2})?)$">
                    @error('sueldo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <label for="porcentaje" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Porcentaje</label>
                    <input type="text" name="porcentaje" id="porcentaje" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ej. 1 al 15" pattern="^(0[0-9]|1[0-5])$">
                    @error('porcentaje')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
            <script>
                const sueldoInput = document.getElementById('sueldo');
                const porcentajeInput = document.getElementById('porcentaje');
        
                sueldoInput.addEventListener('input', () => {
                    if (sueldoInput.value) {
                        porcentajeInput.disabled = true;
                        porcentajeInput.value = '';
                    } else {
                        porcentajeInput.disabled = false;
                    }
                });
            </script>
    </x-modal.create>
    
    @foreach ($employees as $employee)
        <x-modal.edit>
            <x-slot:url>
                {{ route('employees.update', $employee['id']) }}
            </x-slot:url>

            <x-slot:id>
                {{ 'employee-' . $employee['id'] }}
            </x-slot:id>

            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        (s)
                    </label>
                    <input type="text" name="nombre" id="nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $employee['nombre'] }}" placeholder="Nombre" required="">
                </div>
                <div>
                    <label for="apellidos"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $employee['apellidos'] }}" placeholder="Apellidos" required="">
                </div>
                <div>
                    <label for="telefono"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                    <input type="tel" name="telefono" id="telefono"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $employee['telefono'] }}" placeholder="Telefono" required="" pattern="[0-9]{10}">
                </div>
                <div>
                    <label for="codigoAcceso"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo
                        de
                        Acceso</label>
                    <input type="text" name="codigoAcceso" id="codigoAcceso"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $employee['codigoAcceso'] }}" placeholder="Codigo de Acceso" required="">
                </div>
                <div>
                    <label for="rol"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona
                        un
                        rol</label>
                    <select id="rol" name="rol"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected>Selecciona un rol</option>
                        @foreach ($roles as $rol)
                            <option @if ($rol['nombre'] == $employee['rolName']) selected @endif value="{{ $rol['id'] }}">
                                {{ $rol['nombre'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid gap-4 md:gap-6 sm:grid-cols-2">
                    <div>
                        <label for="sueldo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sueldo/Dia</label>
                        <input type="number" name="sueldo" id="sueldo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $employee['sueldo'] }}" placeholder="$299" required="">
                    </div>
                    <div>
                        <label for="comision"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comision</label>
                        <input type="number" name="comision" id="comision"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $employee['porcentaje'] }}" placeholder="9%" required="">
                    </div>
                </div>

                <div>
                    <label class="my-3 relative inline-flex items-center cursor-pointer">
                        <input name="status" id="status" type="checkbox" value="1" class="sr-only peer"
                            @if ($employee['status'] == '1') checked @endif>
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ml-4 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Estado (Activo - Inactivo)
                        </span>
                    </label>
                </div>
            </div>
        </x-modal.edit>

        <x-modal.show>
            <x-slot:id>
                {{ 'employee-' . $employee['id'] }}
            </x-slot:id>

            <x-slot:name>
                {{ $employee['nombre'] . ' ' . $employee['apellidos'] }}
            </x-slot:name>

            <x-slot:filter>
                {{ $employee['rolName'] }}
            </x-slot:filter>

            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Nombre</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                        </path>
                    </svg>
                    {{ $employee['nombre'] . ' ' . $employee['apellidos'] }}
                </dd>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Puesto</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                        </path>
                    </svg>
                    {{ $employee['rolName'] }}
                </dd>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Estado</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                        </path>
                    </svg>
                    <span
                        class="w-full text-xs font-medium inline-flex items-center px-2 py-1 rounded {{ $employee['status'] == '1' ? 'bg-green-100 text-green-800  dark:bg-green-200 dark:text-green-800' : 'bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-800' }} ">
                        {{ $employee['status'] == '1' ? 'Activo' : 'Inactivo' }}
                    </span>
                </dd>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Telefono</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z">
                        </path>
                    </svg>
                    {{ $employee['telefono'] }}
                </dd>
            </div>
            <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Sueldo por dia</dt>
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
                        {{ $employee['sueldo'] }}
                    </span>
                </dd>
            </div>
            <div class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Comision</dt>
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
                        {{ $employee['porcentaje'] }}
                    </span>
                </dd>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700  dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Codigo de Acceso
                </dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z"></path>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z">
                        </path>
                    </svg>
                    {{ $employee['codigoAcceso'] }}
                </dd>
            </div>

        </x-modal.show>
    @endforeach
</x-app>

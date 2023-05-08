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
        Usuarios
    </x-slot:title>

    {{-- Codificacion componente  --}}
    @livewire('tables.users', ['users' => $users])
    {{-- Llamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}

    <x-modal.create>
        <x-slot:modulo>
            Usuarios
        </x-slot:modulo>

        <x-slot:url>
            {{ route('users.store') }}
        </x-slot:url>

        <!-- Formulario para nuevo usuario -->
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de
                    usuario</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="nombre" required="">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Correo Electronico</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="correo@gmail.com" required="">
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Contraseña</label>
                <input type="password" name="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="*******" required="">
            </div>
            <div>
                <label for="cel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Telefono</label>
                <input type="cel" name="cel" id="cel"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="000 000 0000" required="">
            </div>

            <!-- SELECCION DE ROLES YA ESTABLECIDOS -->
            <div>
                <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Cargo</label>
                <select id="roles" name="roles"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecciona un cargo</option>
                    <option value="admin">Administrador</option>
                    <option value="cajero">Cajero</option>
                    <option value="user">Usuario de venta</option>
                </select>
            </div>
        </div>

    </x-modal.create>

    @foreach ($users as $user)
    <x-modal.edit>
            <x-slot:url>
                {{ route('users.update', $user['id']) }}
            </x-slot:url>

            <x-slot:id>
                {{ 'user-' . $user['id'] }}
            </x-slot:id>

            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                        (s)
                    </label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $user['name'] }}" placeholder="name" required="">
                </div>
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                    <input type="text" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $user['email'] }}" placeholder="Correo electronico" required="" >
                </div>
                <div>
                    <label for="cel"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                    <input type="cel" name="cel" id="cel"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $user['cel'] }}" placeholder="Telefono" required="" pattern="[0-9]{10}">
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                    <input type="text" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" placeholder="Contraseña" required="">
                </div>
                <div>
                    <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cargo</label>
                    <select id="roles" name="roles"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selecciona un cargo</option>
                        <option value="admin">Administrador</option>
                        <option value="cajero">Cajero</option>
                        <option value="user">Usuario de venta</option>
                    </select>
                </div>
            </div>
        </x-modal.edit>

        <x-modal.show>
            <x-slot:id>
                {{ 'user-' . $user['id'] }}
            </x-slot:id>

            <x-slot:name>
                {{ $user['name'] }}
            </x-slot:name>

            <x-slot:filter>
                {{ $user['name'] }}
            </x-slot:filter>

            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Nombre de usuario</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                        </path>
                    </svg>
                    {{ $user['name']  }}
                </dd>
            </div>

            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Correo</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                        </path>
                    </svg>
                    {{ $user['email']  }}
                </dd>
            </div>

            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Puesto</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                        </path>
                    </svg>
                    {{ $user['roles'] }}
                </dd>
            </div>

            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                    Telefono</dt>
                <dd class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z">
                        </path>
                    </svg>
                    {{ $user['cel'] }}
                </dd>
            </div>

        </x-modal.show>


    @endforeach

</x-app>
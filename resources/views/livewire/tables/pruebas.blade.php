<div>
    @if ($step)
        <ol class="flex items-center w-full mb-4 sm:mb-5">
            @if ($step == 1)
                <li
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>

                <li
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                            <path fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>

                <li class="flex items-center w-full">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
            @elseif ($step == 2)
                <li
                    class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300"
                            class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>

                <li
                    class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                            <path fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>

                <li class="flex items-center w-full">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
            @elseif ($step == 3)
                <li
                    class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300"
                            class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li
                    class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                            <path fill-rule="evenodd"
                                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li class="flex items-center w-full">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
            @endif
        </ol>

        <section class="bg-gray-50 dark:bg-gray-900 antialiased">
            <div class="mx-auto max-w-screen-2xl ">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    @if ($step == 1)
                        <fieldset>
                            <legend class="sr-only">Empleados que pueden realizar las ordenes</legend>
                            <h1
                                class="p-2 mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                                Accede para empezar con el pedido
                            </h1>
                            <div class="grid grid-cols-3 gap-4 sm:grid-cols-3">
                                <div class="p-4">
                                    <h3
                                        class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                        <span
                                            class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                            Seleciona tu usuario
                                        </span>
                                    </h3>

                                    @foreach ($employees as $employee)
                                        @if ($employee_id == $employee['id'])
                                            <label
                                                class="my-2 text-gray-500 dark:text-gray-400 border rounded-md py-3 px-3 flex  justify-between text-sm font-medium uppercase sm:flex-1 opacity-50 cursor-not-allowed">
                                                <div class="flex">
                                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                                        </path>
                                                    </svg>
                                                    <input type="radio" name="size-choice"
                                                        value="{{ $employee['id'] }}" disabled class="sr-only"
                                                        aria-labelledby="size-choice-{{ $employee['id'] }}-label">
                                                    <span class="mr-2"
                                                        id="size-choice-{{ $employee['id'] }}-label">{{ $employee['nombre'] . ' ' . $employee['apellidos'] }}</span>

                                                </div>
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center p-1 rounded dark:bg-green-200 dark:text-green-800">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </label>
                                        @else
                                            <label
                                                class="my-2 text-gray-500 dark:text-gray-400 border rounded-md py-3 px-3 flex  justify-between text-sm font-medium uppercase sm:flex-1 cursor-pointer focus:outline-none">
                                                <div class="flex">
                                                    <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z">
                                                        </path>
                                                    </svg>
                                                    <input wire:model='employee_id' type="radio" name="size-choice"
                                                        value="{{ $employee['id'] }}" class="sr-only"
                                                        aria-labelledby="size-choice-{{ $employee['id'] }}-label">
                                                    <span
                                                        id="size-choice-{{ $employee['id'] }}-label">{{ $employee['nombre'] . ' ' . $employee['apellidos'] }}</span>
                                                </div>
                                                <span
                                                    class="bg-primary-100 text-primary-800 text-xs font-extralight inline-flex items-center p-1 rounded dark:bg-primary-200 dark:text-primary-800">
                                                    Seleccionar
                                                    <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                                            d="M3.75 12a.75.75 0 01.75-.75h13.19l-5.47-5.47a.75.75 0 011.06-1.06l6.75 6.75a.75.75 0 010 1.06l-6.75 6.75a.75.75 0 11-1.06-1.06l5.47-5.47H4.5a.75.75 0 01-.75-.75z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </label>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-span-2 p-4">
                                    <h3
                                        class="ml-4 mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                        <span
                                            class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                            Ingresa tu codigo de acceso
                                        </span>
                                    </h3>

                                    <div class="m-4">
                                        <label for="codigo"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo
                                            de acceso</label>
                                        <input wire:model='codigo_acceso'
                                            @if (!$employee_id) disabled readonly @endif
                                            placeholder="••••••••••••••••" type="password" id="codigo"
                                            class="text-md font-extrabold block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <button
                                            class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white @if ($codigo_acceso) border-transparent text-gray-900 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 @else border-b text-gray-400 @endif"
                                            @if (!$codigo_acceso) disabled @endif
                                            wire:click='validatedEmployee' wire:target='validatedEmployee'>
                                            Empezar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    @elseif ($step == 2)
                        <fieldset>
                            <legend class="sr-only">Empleados que pueden realizar las ordenes</legend>

                            <div class="flex items-center space-x-4">
                                <h1
                                    class="p-2 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                                    Empieza a crear tu orden ahora
                                </h1>
                                <button type="button"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Continuar con la orden
                                </button>
                                <button type="button"  wire:click="clear"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Limpiar Tabla
                                </button>
                                <button type="button"
                                    class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar
                                </button>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div class="p-4">
                                    <h3
                                        class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                        <span
                                            class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                            Lista de Productos
                                        </span>
                                    </h3>

                                    <div
                                        class="w-full bg-gray-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <ul class="overflow-y-auto text-sm font-medium text-center text-gray-500 divide-x divide-gray-200  sm:flex dark:divide-gray-600 dark:text-gray-400"
                                            id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">

                                            @foreach ($categories as $category)
                                                <li class="w-full">
                                                    <button id="{{ $category['nombre'] }}-tab"
                                                        data-tabs-target="#{{ $category['nombre'] }}" type="button"
                                                        role="tab" aria-controls="stats"
                                                        aria-selected="@if ($step == 2 && $loop->first) true @else false @endif"
                                                        class="inline-block w-full p-3 @if ($loop->first) rounded-tl-lg @endif @if ($loop->last) rounded-tr-lg @endif  bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">{{ $category['nombre'] }}</button>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div id="fullWidthTabContent"
                                            class="border-t border-gray-200 dark:border-gray-600">
                                            @foreach ($categories as $category)
                                                <div class="@if (!$loop->first) hidden @endif p-4 bg-gray-50 rounded-lg dark:bg-gray-800"
                                                    id="{{ $category['nombre'] }}" role="tabpanel"
                                                    aria-labelledby="{{ $category['nombre'] }}-tab">
                                                    <div class="flow-root">
                                                        <ul role="list"
                                                            class="divide-y divide-gray-200 dark:divide-gray-700">
                                                            @forelse ($category['productos'] as $product)
                                                                <li class="py-2">
                                                                    <div class="flex items-center space-x-4">
                                                                        <div class="flex-shrink-0">
                                                                            <img class="w-9 h-9 rounded-full"
                                                                                src="{{ Storage::url($product['url_img']) }}"
                                                                                alt="Neil image">
                                                                        </div>
                                                                        <div class="flex-1 min-w-0">
                                                                            <p
                                                                                class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                                {{ $product['nombre'] }}
                                                                            </p>
                                                                            <p
                                                                                class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                                @if ($product['tamanio'] == 'S')
                                                                                    Chico
                                                                                @endif
                                                                                @if ($product['tamanio'] == 'M')
                                                                                    Mediano
                                                                                @endif
                                                                                @if ($product['tamanio'] == 'L')
                                                                                    Grande
                                                                                @endif
                                                                                @if ($product['tamanio'] == 'XL')
                                                                                    Familiar
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                        <div
                                                                            class="inline-flex items-center text-end font-semibold text-gray-800 dark:text-white">
                                                                            ${{ $product['precio'] }}
                                                                        </div>
                                                                        <button
                                                                            wire:click="addItem('{{ $product['id'] }}', '{{ $product['nombre'] }}','{{ $product['precio'] }}','{{ $product['tamanio'] }}','{{ $product['categoriaName'] }}')"
                                                                            type="button"
                                                                            class="focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2 m-2 text-center inline-flex items-center @if ($stock > 0) text-white focus:ring-blue-300  bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 @else border border-b dark:text-white @endif">
                                                                            <svg class="w-5 h-5" fill="currentColor"
                                                                                viewBox="0 0 24 24"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                aria-hidden="true">
                                                                                <path clip-rule="evenodd"
                                                                                    fill-rule="evenodd"
                                                                                    d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z">
                                                                                </path>
                                                                            </svg>
                                                                            <span class="sr-only">Increment</span>
                                                                        </button>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                                <li class="py-3 sm:py-4">
                                                                    <div class="flex items-center space-x-4">
                                                                        <div class="flex-shrink-0">
                                                                            <img class="w-8 h-8 rounded-full"
                                                                                src="{{ Storage::url('public/images/info.png') }}"
                                                                                alt="Neil image">
                                                                        </div>
                                                                        <div class="flex-1 min-w-0">
                                                                            <p
                                                                                class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                                No hay Productos para seleccionar en
                                                                                {{ $category['nombre'] }}
                                                                            </p>
                                                                            <p
                                                                                class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                                Agregue productos a esta categoria
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-2 p-4">
                                    <h3
                                        class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                        <span
                                            class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                            Productos seleccionados para la orden
                                        </span>
                                    </h3>

                                    <div class="overflow-x-auto rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="p-4">Nombre</th>
                                                    <th scope="col" class="p-4">Tamaño</th>
                                                    <th scope="col" class="p-4">Precio</th>
                                                    <th scope="col" class="p-4">Cantidad</th>
                                                    <th scope="col" class="p-4">Categoria</th>
                                                    <th scope="col" class="p-4">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse (Cart::content() as $product)
                                                    <tr
                                                        class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">

                                                        <th scope="row"
                                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <div class="flex items-center mr-3">
                                                                {{ $product->name }}
                                                            </div>
                                                        </th>
                                                        <td class="px-4 py-3">
                                                            <span
                                                                class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                                                @if ($product->options->size == 'S')
                                                                    Chico
                                                                @endif
                                                                @if ($product->options->size == 'M')
                                                                    Mediano
                                                                @endif
                                                                @if ($product->options->size == 'L')
                                                                    Grande
                                                                @endif
                                                                @if ($product->options->size == 'XL')
                                                                    Familiar
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td
                                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            ${{ $product->price }}
                                                        </td>

                                                        <td
                                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $product->qty }}
                                                        </td>
                                                        <td
                                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $product->options->category }}
                                                        </td>
                                                        <td>
                                                            <button wire:click="removeItem('{{ $product->rowId }}')"
                                                                type="button"
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
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr
                                                        class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 ">
                                                        <td colspan="7" class="px-6 py-4">
                                                            <div class="flex items-center space-x-4">
                                                                <div class="flex-shrink-0 rounded-full">
                                                                    <img class="w-8 h-8 rounded-full"
                                                                        src="{{ Storage::url('public/images/info.png') }}"
                                                                        alt="Neil image">
                                                                </div>
                                                                <div class="flex-1 min-w-0">
                                                                    <p
                                                                        class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                        No hay productos
                                                                    </p>
                                                                    <p
                                                                        class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                        Selecione productos para agregarlos a la
                                                                        orden
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
                        </fieldset>
                    @elseif ($step == 3)
                    @endif
                </div>
            </div>
        </section>
    @else
        <section class="bg-gray-50 dark:bg-gray-900 antialiased">
            <div class="mx-auto max-w-screen-2xl ">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" placeholder="Buscar Mesa"
                                        required=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button type="button"
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
                            {{-- Crear foreach de mesas --}}
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="max-w-sm rounded-lg shadow bg-green-600">
                                    <div class="w-full max-w-sm p-2">
                                        <div class="flex items-center justify-between mb-4">
                                            <h5 class=" text-xl  font-bold tracking-tight text-white ">
                                                Mesa {{ $i }}
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

                                    <button wire:click="$set('table', 'Mesa {{ $i }}')" type="button"
                                        class="block w-full p-2 h-56 bg-green-500 hover:bg-green-400 border border-gray-200 rounded-lg shadow dark:border-gray-700">
                                        <h5 class="text-sm  tracking-tight text-white">
                                            Presiona aqui para iniciar la orden
                                        </h5>
                                        <figure
                                            class="mt-2 relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                            <img class="rounded-lg h-28 w-28 mx-auto"
                                                src="https://cdn-icons-png.flaticon.com/512/10076/10076088.png"
                                                alt="rol">
                                        </figure>
                                    </button>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>

<div>
    @if (session('alert-order'))
        <x-alert.danger>
            {{ session('alert-order') }}
        </x-alert.danger>
    @endif

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
                    <svg class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100" fill="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z">
                        </path>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z">
                        </path>
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
                    <svg class="w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100" fill="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z">
                        </path>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z">
                        </path>
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
                    <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z">
                        </path>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z">
                        </path>
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
        @elseif ($step == 4)
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
                    <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z">
                        </path>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z">
                        </path>
                    </svg>
                </div>
            </li>
            <li class="flex items-center w-full">
                <div
                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-700 shrink-0">
                    <svg aria-hidden="true" class="w-5 h-5 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100"
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
                @elseif($step == 2)
                    <fieldset>
                        <legend class="sr-only">Toma de orden</legend>

                        <div class="flex items-center space-x-4">
                            <h1
                                class="p-2 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                                Empieza a crear tu orden ahora
                            </h1>
                            <button type="button" wire:click='continue'
                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Continuar
                            </button>
                            <button type="button" wire:click="clear"
                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                    </path>
                                </svg>
                                Limpiar Orden
                            </button>
                            <button type="button" wire:click="destroy"
                                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Cancelar Orden
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

                                {{-- Buscador --}}
                                <div class="flex items-center mb-2">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                            </svg>
                                        </div>
                                        <input wire:model='search' type="text" id="simple-search"
                                            placeholder="Buscar producto..." required=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </div>
                                {{-- Fin Buscador --}}

                                <div
                                    class="w-full bg-gray-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <ul
                                        class="overflow-y-auto text-sm font-medium text-center text-gray-500 divide-x divide-gray-200  sm:flex dark:divide-gray-600 dark:text-gray-400">

                                        @foreach ($categories as $category)
                                            <li class="w-full">
                                                <button type="button" wire:click="changeTab({{ $category['id'] }})"
                                                    class="inline-block w-full p-3 @if ($loop->first) rounded-tl-lg @endif @if ($loop->last) rounded-tr-lg @endif  bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">
                                                    {{ $category['nombre'] }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div id="fullWidthTabContent"
                                        class="border-t border-gray-200 dark:border-gray-600">
                                        @foreach ($categories as $category)
                                            @if ($activeTab == $category['id'])
                                                <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800">
                                                    <div class="flow-root">
                                                        <ul role="list"
                                                            class="divide-y divide-gray-200 dark:divide-gray-700">
                                                            @forelse ($filterProducts as $product)
                                                                @if ($product['categoriaName'] == $category['nombre'])
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
                                                                                wire:click="addItem('{{ $product['id'] }}', '{{ $product['nombre'] }}','{{ $product['precio'] }}','{{ $product['tamanio'] }}','{{ $product['categoriaName'] }}','{{ $product['url_img'] }}')"
                                                                                type="button"
                                                                                class="focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2 m-2 text-center inline-flex items-center @if ($stock > 0) text-white focus:ring-blue-300  bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 @else border border-b dark:text-white @endif">
                                                                                <svg class="w-5 h-5"
                                                                                    fill="currentColor"
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

                                                                            <button
                                                                                wire:click="decItem('{{ $product['id'] }}', '{{ $product['nombre'] }}','{{ $product['precio'] }}','{{ $product['tamanio'] }}','{{ $product['categoriaName'] }}','{{ $product['url_img'] }}')"
                                                                                type="button"
                                                                                class="focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2 m-2 text-center inline-flex items-center @if ($stock > 0) text-white focus:ring-blue-300  bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 @else border border-b dark:text-white @endif">

                                                                                <svg class="w-5 h-5"
                                                                                    fill="currentColor"
                                                                                    viewBox="0 0 24 24"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    aria-hidden="true">
                                                                                    <path clip-rule="evenodd"
                                                                                        fill-rule="evenodd"
                                                                                        d="M5.25 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75z">
                                                                                    </path>
                                                                                </svg>
                                                                                <span class="sr-only">Decrement</span>
                                                                            </button>
                                                                        </div>
                                                                    </li>
                                                                @endif

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
                                            @endif
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

                                <div class="overflow-x-auto rounded-lg shadow">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="p-4">Nombre</th>
                                                <th scope="col" class="p-4">Tamaño</th>
                                                <th scope="col" class="p-4">Precio</th>
                                                <th scope="col" class="p-4">Cantidad</th>
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
                                                            class="w-full bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
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
                                                    <td class="flex">
                                                        <button type="button"
                                                            data-modal-target="note-{{ $product->rowId }}-modal"
                                                            data-modal-toggle="note-{{ $product->rowId }}-modal"
                                                            class="py-2 px-3 mr-2 my-2 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                            <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path clip-rule="evenodd" fill-rule="evenodd"
                                                                    d="M18.97 3.659a2.25 2.25 0 00-3.182 0l-10.94 10.94a3.75 3.75 0 105.304 5.303l7.693-7.693a.75.75 0 011.06 1.06l-7.693 7.693a5.25 5.25 0 11-7.424-7.424l10.939-10.94a3.75 3.75 0 115.303 5.304L9.097 18.835l-.008.008-.007.007-.002.002-.003.002A2.25 2.25 0 015.91 15.66l7.81-7.81a.75.75 0 011.061 1.06l-7.81 7.81a.75.75 0 001.054 1.068L18.97 6.84a2.25 2.25 0 000-3.182z">
                                                                </path>
                                                            </svg>
                                                            Agregar Nota
                                                        </button>

                                                        <button wire:click="removeItem('{{ $product->rowId }}')"
                                                            type="button"
                                                            class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 my-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
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
                                                <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 ">
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

                    @foreach (Cart::content() as $product)
                        <!-- Main modal -->
                        <div id="note-{{ $product->rowId }}-modal" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
                            wire:ignore.self>
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="note-{{ $product->rowId }}-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                            Agregar nota al producto</h3>
                                        <div class="space-y-6">
                                            <label for="chat" class="sr-only">Your note</label>
                                            <div
                                                class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                                <textarea wire:model='description' id="chat" rows="2"
                                                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Nota: ...">{{ $product->options->description }}</textarea>
                                                <button type="button"
                                                    wire:click="updateDescriptionItem('{{ $product->rowId }}','{{ $product->options->tamanio }}','{{ $product->options->category }}','{{ $product->options->image }}')"
                                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    <svg aria-hidden="true" class="w-6 h-6 rotate-90"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                                        </path>
                                                    </svg>
                                                    <span class="sr-only">Send note</span>
                                                </button>
                                            </div>
                                            {{-- 
                                                <div>
                                                    <label for="nota"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Nota</label>
                                                    <input type="" name="nota" id="nota"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        placeholder="name@company.com" required>
                                                </div>
                                                <button type="submit"
                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Aceptar</button> 
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif ($step == 3)
                    <fieldset>
                        <legend class="sr-only">Confirmacion de orden</legend>

                        <div class="flex items-center space-x-4">
                            <h1
                                class="p-2 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                                ¿Confirma que su orden esta correcto?
                            </h1>
                            <button type="button" wire:click='cretedOrder'
                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg fill="currentColor" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016 15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969 0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227z">
                                    </path>
                                </svg>
                                Generar Orden
                            </button>

                            <button type="button" wire:click='revers'
                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                    </path>
                                </svg>
                                Checar Orden
                            </button>

                            <button type="button" wire:click="destroy"
                                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Cancelar Orden
                            </button>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div class=" p-4">
                                <h3
                                    class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                    <span
                                        class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                        Productos seleccionados
                                    </span>
                                </h3>

                                <div class="overflow-x-auto rounded-lg shadow">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="p-4">Nombre</th>
                                                <th scope="col" class="p-4">Tamaño</th>
                                                <th scope="col" class="p-4">Precio</th>
                                                <th scope="col" class="p-4">Cantidad</th>
                                                <th scope="col" class="p-4">Categoria</th>
                                                <th scope="col" class="p-4">Nota</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse (Cart::content() as $product)
                                                <tr
                                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <th scope="row"
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center mr-3">
                                                            <img src="{{ Storage::url($product->options->image) }}"
                                                                alt="iMac Front Image" class="h-10 w-auto mr-3">
                                                            {{ $product->name }}
                                                        </div>
                                                    </th>
                                                    <td class="px-4 py-3">
                                                        <span
                                                            class="w-full bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
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
                                                    <td
                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $product->options->description }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 ">
                                                    <td colspan="8" class="px-6 py-4">
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
                @elseif ($step == 4)
                    <fieldset>
                        <legend class="sr-only">Confirmacion de orden</legend>

                        <!-- Modal toggle -->
                        <div class="flex justify-center m-5">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <div
                                    class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <div
                                        class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                                        <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400"
                                            fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Success</span>
                                    </div>
                                    <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                                        Pedido Creado Satisfactoriamente.
                                    </p>
                                    <a href="{{ route('ticket.pedido', $table['id']) }}" target="_blank">
                                        <button type="button" wire:click='createdTicket'
                                            class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900">
                                            Imprimir y continuar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                @endif
            </div>
        </div>
    </section>
</div>

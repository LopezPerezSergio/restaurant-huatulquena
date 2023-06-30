<div>
    @php
    $cartIsEmpty = Cart::content()->isEmpty();
    $buttonClass = $cartIsEmpty ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300';
    @endphp
    <section class="bg-gray-50 dark:bg-gray-900 antialiased">
        <div class="mx-auto max-w-screen-2xl ">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                @if ($step == 1)
                    <fieldset>
                        <legend class="sr-only">Empleado que puede ingresar</legend>
                        {{-- <h1
                            class="p-2 mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                            Accede para visualizar los pedidos de la mesa
                        </h1> --}}
                    </fieldset>
                    <section class="bg-gray-white dark:bg-gray-800 px-6 pt-36 pb-36">
                        <div
                            class="flex w-full max-w-sm mx-auto overflow-hidden rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
                            <div class="hidden bg-cover lg:block lg:w-1/2"
                                style="background-image: url('https://media.admagazine.com/photos/618a5d11532cae908aaf27ab/master/w_1600%2Cc_limit/96644.jpg');">
                            </div>

                            <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
                                <a href="/" class="flex ml-2 md:mr-24">
                                    <img src="{{ Storage::url('public/images/logo.png') }}" class="h-8 mr-3"
                                        alt="FlowBite Logo" />
                                    <span
                                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-sky-500 to-orange-400">
                                        LA HUATULQUEÑA
                                    </span>
                                </a>

                                <h3
                                    class="ml-4 my-4 text-2xl leading-none tracking-tight text-gray-600 dark:text-white">
                                    <span
                                        class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                        Ingresa tu codigo de acceso
                                        @foreach ($employees as $e)
                                            @if ($e['id'] == $table['idEmpleado'])
                                                {{ $e['nombre'] }}
                                            @endif
                                        @endforeach
                                    </span>
                                </h3>
                                {{-- Division --}}


                                <div class="space-y-4 mt-4 md:space-y-6">
                                    <div>
                                        <input wire:model='codigo_acceso' placeholder="••••••••••••••••" type="password"
                                            id="codigo"
                                            class="text-md font-extrabold block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    </div>
                                    <button
                                        class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white 
                                        @if ($codigo_acceso) border-transparent text-white bg-blue-600 hover:bg-blue-500 dark:bg-blue-600 dark:hover:bg-gray-700 
                                        @else border-b text-gray-400 @endif"
                                        @if (!$codigo_acceso) disabled @endif wire:click='validatedEmployee'
                                        wire:target='validatedEmployee'>
                                        Empezar
                                    </button>
                                    <a href="{{ route('orders.index') }}" type="button"
                                        class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white  border-transparent text-gray-900 bg-gray-100 hover:bg-red-600 hover:text-white dark:bg-gray-800 dark:hover:bg-red-800 ">

                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                @elseif ($step == 2)
                    <fieldset>
                        <legend class="sr-only">Confirmacion de orden</legend>

                        <div class="grid gap-4 mb-4 sm:grid-cols-3">
                            <div class="sm:col-span-2"> </div>
                            <div class="flex items-center space-x-4">
                                <button type="button" wire:click='continue'
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <svg fill="currentColor" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path
                                            d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016 15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969 0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227z">
                                        </path>
                                    </svg>
                                    Generar Orden
                                </button>
                                <button wire:click="openModal"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="button">
                                    <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                        </path>
                                    </svg>
                                    ver cuenta
                                </button>

                                <button wire:click="openModalCerrarOrder"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                        </path>
                                    </svg>
                                    Cerrar cuenta
                                </button>
                                <!-- Botón para abrir el modal -->

                            </div>

                        </div>

                        {{-- TABLA CON PRODUCTOS DEL PEDIDO CARRITO  --}}
                        <div class="grid grid-cols-1 gap-4">
                            <div class=" p-4">
                                <h3
                                    class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                    <span
                                        class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                        Pedidos de la mesa
                                    </span>
                                </h3>
                                <div class="overflow-x-auto rounded-lg shadow">
                                    @forelse ($table['pedidos'] as $t)
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr class="bg-blue-50 dark:bg-blue-200 dark:text-gray-900">
                                                    <th scope="col" class="px-6 py-3 rounded-l-lg ">
                                                        {{ $t['fechaYhora'] }}</th>
                                                    <th scope="col" class="p-4"></th>
                                                    <th scope="col" class="p-4"></th>
                                                    <th scope="col" class="p-4"></th>

                                                    <th scope="col" class="p-4">
                                                        @if (session()->get('user')['rol'] === 'admin' || session()->get('user')['rol'] === 'cajero')
                                                            <button wire:click="deleteOrder({{ $t['id'] }})"
                                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                                type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                Cancelar Pedido
                                                            </button>
                                                            {{-- @else
                                                            <button wire:click="openModalDeleteOrder"
                                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                                type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                Cancelar Pedido </button> --}}
                                                        @endif


                                                    </th>


                                                </tr>
                                                <tr>
                                                    <th scope="col" class="p-4">Nombre</th>
                                                    <th scope="col" class="p-4">Precio</th>
                                                    <th scope="col" class="p-4">Cantidad</th>
                                                    <th scope="col" class="p-4">Categoría</th>
                                                    <th scope="col" class="p-4">
                                                        @if (session()->get('user')['rol'] === 'admin' || session()->get('user')['rol'] === 'cajero')
                                                            Accion
                                                        @endif
                                                    </th>
                                                </tr>
                                            </thead>
                                            @foreach ($ordProd as $op)
                                                @if ($t['id'] == $op['id_Pedido'])
                                                    @foreach ($products as $pro)
                                                        @if ($pro['id'] == $op['id_Producto'])
                                                            <tbody>
                                                                <tr
                                                                    class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                    <th scope="row"
                                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        <div class="flex items-center mr-3">
                                                                            <img src="{{ Storage::url($pro['url_img']) }}"
                                                                                alt="iMac Front Image"
                                                                                class="h-10 w-auto mr-3">
                                                                            {{ $pro['nombre'] }}
                                                                        </div>
                                                                    </th>
                                                                    <td
                                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ $pro['precio'] }}
                                                                    </td>
                                                                    <td
                                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ $op['cantidad'] }}
                                                                    </td>
                                                                    <td
                                                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ $pro['categoriaName'] }}
                                                                    </td>
                                                                    @if (session()->get('user')['rol'] === 'admin' || session()->get('user')['rol'] === 'cajero')
                                                                        <td
                                                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                            <button
                                                                                wire:click="deleteProductOrder({{ $op['id'] }}, {{ $t['id'] }})"
                                                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                                                type="button">

                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="h-4 w-4 mr-2 -ml-0.5"
                                                                                    viewbox="0 0 20 20"
                                                                                    fill="currentColor"
                                                                                    aria-hidden="true">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>
                                                                            </button>
                                                                        </td>
                                                                    @endif

                                                                </tr>

                                                            </tbody>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                        </table>

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
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            Selecione productos para agregarlos a la
                                                            orden
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse



                                </div>
                            </div>
                        </div>
                    </fieldset>
                @elseif ($step == 3)
                    <fieldset>
                        <legend class="sr-only">Toma de orden</legend>

                        {{-- <div class="grid gap-4 mb-4 sm:grid-cols-1">

                            <div class="flex items-center space-x-4">

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
                                <button type="button" wire:click="revers"
                                    class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar Orden 22
                                </button>
                            </div>

                        </div> --}}
                        <div class="grid gap-4 mb-4 sm:grid-cols-3">
                            <div class="sm:col-span-2"> </div>
                            <div class="flex items-center space-x-4">
                                <button type="button" wire:click="continue"
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white rounded-lg {{ $buttonClass }}"
                                    @if ($cartIsEmpty) disabled @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
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
                                <a href="{{ route('orders.index') }}" type="button"
                                <button type="button" wire:click="revers"
                                {{--  <button type="button" wire:click="destoy"  --}}
                                    class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cancelar Orden
                                </button>
                                </a>
                            </div>

                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="p-4">
                                <h3
                                    class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                    <span
                                        class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                        Productos
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
                                                                @if ($product['categoriaName'] == $category['nombre'] && $product['status'] == 1)
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
                                                                                Agregue productos a esta categoría
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
                            {{-- tabla de productos por categoria --}}
                            <div class="col-span-2 p-4">
                                <h3
                                    class="mb-4 text-2xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">
                                    <span
                                        class="underline underline-offset-3 decoration-2 decoration-blue-400 dark:decoration-blue-600">
                                        Orden
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
                                                        <button
                                                            wire:click="seleccionDesc('{{ $product->rowId }}','{{ $product->options->size }}','{{ $product->options->category }}','{{ $product->options->image }}')"
                                                            type="button"
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
                @elseif ($step == 4)
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
                            {{--  creo que es mejor poner el revers en el wireClic  --}}
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
                @elseif ($step == 5)
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

    @if ($showModalDeleteOrder)
        <div class=" fixed top-0 left-0 w-full h-full flex items-center justify-center ">
            <div class="relative w-full max-w-2xl max-h-full ">
                <!-- Modal content -->
                <div class="relative bg-blue-100 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Elimnar orden
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="openModalDeleteOrder">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="relative overflow-x-auto">
                            <div class="space-y-4 mt-4 md:space-y-6">
                                <div>
                                    <input wire:model='codigo_acceso' placeholder="••••••••••••••••" type="password"
                                        id="codigo"
                                        class="text-md font-extrabold block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                </div>
                                <button
                                    class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white @if ($codigo_acceso) border-transparent text-white bg-blue-600 hover:bg-gray-200 dark:bg-blue-600 dark:hover:bg-gray-700 @else border-b text-gray-400 @endif"
                                    @if (!$codigo_acceso) disabled @endif wire:click='validatedEmployee'
                                    wire:target='validatedEmployee'>
                                    Empezar
                                </button>
                                <a href="{{ route('orders.index') }}" type="button"
                                    class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white  border-transparent text-gray-900 bg-gray-100 hover:bg-red-600 hover:text-white dark:bg-gray-800 dark:hover:bg-red-800 ">

                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                    </div>
                </div>
            </div>

        </div>
    @endif

    @if ($showModal)
        <!-- Main modal -->
        <div class=" fixed top-0 left-0 w-full h-full flex items-center justify-center ">
            <div class="relative w-full max-w-2xl max-h-full ">
                <!-- Modal content -->
                <div class="relative bg-blue-100 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Cuenta de {{ $table['nombre'] }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="openModal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-800 dark:text-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio Unitario
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuenta as $c)
                                        <tr class="bg-white dark:bg-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $c['cantidad'] }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $c['nombre'] }}
                                            </td>
                                            <td class="px-6 py-4">
                                                $ {{ $c['precio'] }}
                                            </td>
                                            <td class="px-6 py-4">
                                                $ {{ $c['total'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="text-gray-700 bg-white dark:text-white dark:bg-gray-700">
                                        <td class="px-6 py-3"></td>
                                        <th scope="row" class="px-6 py-3 text-base"></th>
                                        <td class="px-6 py-3"></td>
                                        <td class="px-6 py-3"></td>
                                    </tr>
                                    <tr class="font-semibold text-gray-900 bg-white dark:text-white dark:bg-gray-700">
                                        <td class="px-6 py-3"></td>
                                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                                        <td class="px-6 py-3"></td>
                                        <td class="px-6 py-3 text-base">${{ $total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" wire:click='openModalCerrarOrder'
                            class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                </path>
                            </svg>
                            Cerrar cuenta
                        </button>

                    </div>
                </div>
            </div>

        </div>
    @endif

    @if ($showModalCerrarOrder)
        <!--  Esto sirve-->
        <!-- Main modal -->
        <div id="modalConfirmacion" class="fixed top-0 left-0 w-full h-full flex items-center justify-center">
            <div class="relative w-full max-w-2xl max-h-full ">
                <!-- Modal content -->
                <div class="relative bg-blue-100 rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Confirmacion
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="openModalCerrarOrder">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="relative overflow-x-auto">
                            <p class="text-gray-600 mb-4">¿Estás seguro de cerrar la cuenta?</p>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button wire:click="cerrarModal"
                            class="mr-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Cancelar</button>
                        <form id="formCerrarCuenta" action="{{ route('ticket.pedido1', $table['id']) }}"
                            method="POST" target="_blank">
                            @csrf
                            <button type="submit" wire:click="cerrarCuenta"
                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Aceptar</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($showModalDesc)
        <!-- Main modal -->
        <div class=" fixed top-0 left-0 w-full h-full flex items-center justify-center ">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        wire:click="openModalDescripcion">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
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
                            <div>
                                <textarea wire:model='description' id="chat" rows="3"
                                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Nota: ...">{{ $productDesc }}</textarea>
                            </div>

                            <button type="submit"
                                wire:click="updateDescriptionItem('{{ $productId }}','{{ $productTam }}','{{ $productCat }}','{{ $productImg }}')"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Aceptar</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>

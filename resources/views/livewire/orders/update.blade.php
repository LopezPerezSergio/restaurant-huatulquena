<div>
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
                                    </span>
                                </h3>
                                {{-- Division --}}
                                <div class="flex items-center justify-between mt-4">
                                    <span class="w-full border-b dark:border-gray-600 ">
                                        {{ $table['idEmpleado'] }}
                                    </span>
                                </div>

                                <div class="space-y-4 mt-4 md:space-y-6">
                                    <div>
                                        <input wire:model='codigo_acceso' placeholder="••••••••••••••••" type="password"
                                            id="codigo"
                                            class="text-md font-extrabold block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    </div>
                                    <button
                                        class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white @if ($codigo_acceso) border-transparent text-gray-900 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 @else border-b text-gray-400 @endif"
                                        @if (!$codigo_acceso) disabled @endif wire:click='validatedEmployee'
                                        wire:target='validatedEmployee'>
                                        Empezar
                                    </button>
                                    <a href="{{ route('orders.index') }}" type="button"
                                        class="flex w-full flex-1 items-center justify-center rounded-md border mt-4 py-3 px-8 text-base font-medium dark:text-white  border-transparent text-gray-900 bg-gray-100 hover:bg-yellow-400 dark:bg-gray-800 dark:hover:bg-gray-700 ">

                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                @elseif ($step == 2)
                    <fieldset>
                        <legend class="sr-only">Confirmacion de orden</legend>

                        <div class="flex items-center space-x-4">
                            <h1
                                class="p-2 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                                Lista de los pedidos
                            </h1>
                            <button type="button"
                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg fill="currentColor" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016 15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969 0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227z">
                                    </path>
                                </svg>
                                Generar Orden
                            </button>

                            <button data-modal-target="staticModal" data-modal-toggle="staticModal"
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

                            <a href="{{ route('orders.index') }}">
                                <button type="button" wire:click='cerrarCuenta'
                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                        </path>
                                    </svg>
                                    Cerrar cuenta
                                </button>
                            </a>


                        </div>

                        {{-- TABLA CON PRODUCTOS DEL PEDIDO CARRITO  --}}
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
                                                                    No hay productos asignados a la orden
                                                                </p>
                                                                <p
                                                                    class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                    Selecione productos para agregarlos
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
                @endif
            </div>
        </div>
    </section>


    <!-- Main modal -->
    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Cuenta de {{ $table['nombre'] }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="staticModal">
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
                                <tr class="text-gray-700 dark:text-white dark:bg-gray-700">
                                    <td class="px-6 py-3"></td>
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td class="px-6 py-3"></td>
                                    <td class="px-6 py-3"></td>
                                </tr>
                                <tr class="font-semibold text-gray-900 dark:text-white dark:bg-gray-700">
                                    <td class="px-6 py-3"></td>
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3"></td>
                                    <td class="px-6 py-3">${{ $total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button" wire:click='cerrarCuenta'
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

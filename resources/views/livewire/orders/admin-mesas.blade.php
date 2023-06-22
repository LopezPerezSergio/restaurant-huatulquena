<div>
    <div class="mx-auto max-w-screen-2xl mb-4 ">
        <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            <button type="button" id="createProductButton" data-modal-toggle="createProductModal"
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
    @foreach ($tables as $table)
        <div id="accordion-arrow-icon" data-accordion="open">
            <h2 id="accordion-arrow-icon-heading-{{ $table['id'] }}">

                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-arrow-icon-body-{{ $table['id'] }}" aria-expanded="false"
                    aria-controls="accordion-arrow-icon-body-{{ $table['id'] }}">
                    <span>{{ $table['nombre'] }}</span>
                    @if ($table['status'] == 2)
                        @foreach ($employees as $employee)
                            @if ($employee['id'] == $table['idEmpleado'])
                                <span>Atendido por : {{ $employee['nombre'] }}</span>
                            @endif
                        @endforeach
                    @endif
                    <svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-arrow-icon-body-{{ $table['id'] }}" class="hidden"
                aria-labelledby="accordion-arrow-icon-heading-{{ $table['id'] }}">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex justify-end">
                            <button wire:click="openModal('{{ $table['id'] }}')"
                                class="mx-2 py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg class="h-4 w-4 mr-2 -ml-0.5" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10.5 3A1.501 1.501 0 009 4.5h6A1.5 1.5 0 0013.5 3h-3zm-2.693.178A3 3 0 0110.5 1.5h3a3 3 0 012.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 01-3 3H6.75a3 3 0 01-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15z">
                                    </path>
                                </svg>
                                ver cuenta
                            </button>

                        </div>

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
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="p-4">Nombre</th>
                                                <th scope="col" class="p-4">Precio</th>
                                                <th scope="col" class="p-4">Cantidad</th>
                                                <th scope="col" class="p-4">Categoria</th>
                                                <th scope="col" class="p-4">
                                                    Accion
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
                                                                <td
                                                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    <button
                                                                        wire:click="deleteProductOrder({{ $op['id'] }}, {{ $t['id'] }})"
                                                                        class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                                        type="button">

                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-4 w-4 mr-2 -ml-0.5"
                                                                            viewbox="0 0 20 20" fill="currentColor"
                                                                            aria-hidden="true">
                                                                            <path fill-rule="evenodd"
                                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
                                                                    </button>
                                                                </td>


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
                                                        Mesa disponible
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <x-modal.create>
        <x-slot:modulo>
            Mesa
        </x-slot:modulo>

        <x-slot:url>
            {{ route('tables.store') }}
        </x-slot:url>

        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                    (s)</label>
                <input type="text" name="nombre" id="nombre"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Nombre" required="">
            </div>
            <div>
                <label for="capacidad"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Numero de personas" required="">
            </div>
            <div class="mt-5">
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
    </x-modal.create>


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
                            Cuenta de {{ $name_table }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="openModal2">
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
                                    @if ($cuenta != null)
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
                                    @else
                                        <tr class="bg-white dark:bg-gray-700">
                                            <th scope="row" colspan="4"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Sin productos asignados al pedido
                                            </th>
                                        </tr>
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr class="text-gray-700 bg-white dark:text-white dark:bg-gray-700">
                                        <td class="px-6 py-3"></td>
                                        <th scope="row" class="px-6 py-3 text-base"></th>
                                        <td class="px-6 py-3"></td>
                                        <td class="px-6 py-3"></td>
                                    </tr>
                                    <tr class="font-semibold text-gray-900 bg-white dark:text-white dark:bg-gray-700">
                                        
                                        @if ($cuenta != null)
                                        <td class="px-6 py-3"></td>
                                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                                        <td class="px-6 py-3"></td>
                                        <td class="px-6 py-3 text-base">${{ $total }}</td>
                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    {{-- <div
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

                    </div> --}}
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
                        <form id="formCerrarCuenta" action="{{ route('ticket.pedido1', $id_table) }}" method="POST"
                            target="_blank">
                            @csrf
                            <button type="submit" wire:click="cerrarCuenta"
                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

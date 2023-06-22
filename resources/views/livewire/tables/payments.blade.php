<div>

    {{-- formulario para pagos de empleados --}}
    <x-modal.createPayEmployee>
        <x-slot:url>
            {{ route('nominas.store') }}
        </x-slot:url>

        <div>
            <div class="grid gap-4 mb-4 sm:grid-cols-3">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Empleado</label>
                    <select id="nombre" name="nombre" wire:model="employeeSelect" wire:change="captura"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" selected>Selecciona un Empleado</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee['nombre'] }}">{{ $employee['nombre'] }}</option>
                        @endforeach

                    </select>
                </div>
                
                <div>
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sueldo</label>
                    <input type="text" name="descripcion" id="descripcion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Sueldo"  wire:model="sueldo">
                </div>

                <div>
                    <label for="porcentaje" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comisión
                        ('%')</label>
                    <input type="text" name="porcentaje" id="porcentaje"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Comisión" wire:model="comision" >
                </div>
            </div>

            <div class="grid gap-4 mb-4 sm:grid-cols-3">
                <div class="sm:col-span-2"></div>
                <div>
                    <div class="mb-2">
                        <label for="pago" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total de
                            pago</label>
                        <input type="text" name="pago" id="pago"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Pago" wire:model="totalPago" value="{{$totalPago}}" >
                    </div>
                </div>
            </div>
        </div>
    </x-modal.createPayEmployee>

    {{-- Tabla que registrara los pagos --}}
    <div class="overflow-x-auto">
        {{-- Fecha --}}
        <div class="grid gap-4 mb-4 sm:grid-cols-3">
            <div class="sm:col-span-2"></div>
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Selecciona una fecha para ver pagos</label>
                <div class="flex justify-end">

                    {{-- Input que esta conectado con la propiedad Search --}}
                    <input wire:model="search" type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Seleccione una fecha para ver pagos">
                </div>
            </div>
        </div>
       
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Pago final
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Accion
                    </th>
                </tr>
            </thead>
            @if($filterPago == null)
                <tbody>
                    <tr class="bg-white dark:bg-gray-800">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        </td>
                    </tr>
                </tbody>
            @else
            @foreach($filterPago as $payment)
                <tbody>
                    <tr class="bg-white dark:bg-gray-800">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $payment['nombre'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment['descripcion'] }}
                        </td>
                        <td class="px-6 py-4"  >
                            {{ $payment['pago'] }}                           
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment['fecha'] }}
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <form method="post" action="{{ route('nominas.destroy', $payment['id']) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
            <tfoot>
                    <tr class="font-semibold text-gray-900 dark:text-white">
                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                        <td class="px-6 py-3"></td>
                        <td class="px-6 py-3" >{{$total}}</td>
                    </tr>
                </tfoot>
            @endif
        </table>

        
    </div>
</div>
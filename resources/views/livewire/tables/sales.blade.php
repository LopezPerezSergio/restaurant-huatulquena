<div>

    {{-- TABLA CON LOS DATOS --}}   
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">   
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Mesero
                </th>
                <th scope="col" class="px-6 py-3">
                    Mesa
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$venta['id']}}
                </th>
                <td class="px-6 py-4">
                    {{$venta['fecha']}}
                </td>
                <td class="px-6 py-4">
                    {{$venta['nombreMesero']}}
                </td>
                <td class="px-6 py-4">
                    {{$venta['nombreMesa']}}
                </td>
                <td class="px-6 py-4">
                   {{$venta['total']}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button type="button"  data-drawer-target="drawer-read-venta-{{ $venta['id'] }}-advanced"
                                                    data-drawer-show="drawer-read-venta-{{ $venta['id'] }}-advanced"
                                                    aria-controls="drawer-read-venta-{{ $venta['id'] }}-advanced"
                                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                    Ver
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
        </x-slot>

        <x-slot:title>
            PRUEBA TICKET
        </x-slot>
        <div >
            <table>
                <tbody>
                    {{ $employees[1]['nombre'] . ' ' . $employees[1]['apellidos'] }}
                    
                </tbody>
            </table>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Cantidad</th>
                        <th scope="col" class="px-4 py-3">Producto</th>
                        <th scope="col" class="px-4 py-3">Descripcion</th>
                        <th scope="col" class="px-4 py-3">Tamaño</th>
                        <th scope="col" class="px-4 py-3">Precio</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    @foreach ($pedido as $pedi)
                    @if($product['id'] == $pedi['id_Producto'])
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th scope="row"
                                class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pedi['cantidad'] }}
                            </th>
                           
                            <td class="px-4 py-2">
                                <span
                                    class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                    {{ $product['nombre'] }}
                                </span>
                            </td>
                            <td
                            class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${{ $pedi['descripcion'] }}</td>
                        </tr>
                        @endif
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{ route('pdfInicial') }}" target="_blank" class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                PDF Inicial
            </a>
            
        </div>
        <div>
            <a href="{{ route('pdfFinal') }}" target="_blank"  class="w-full sm:w-auto justify-center text-white inline-flex bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                PDF Final
            </a>
            
        </div>

</x-app>

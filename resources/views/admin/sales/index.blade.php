<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <x-slot:title>
        Reporte de Ventas
    </x-slot:title>

    @livewire('tables.sales', ['ventas' => $ventas, 'mesas'=>$mesas, 'empleados'=>$empleados]) {{-- Pase de datos para liveware --}}
    {{--  <div class="my-4">
        {{ $ventasPaginadas->links() }}
    </div>  --}}


    @foreach ($ventas as $venta)
        <x-modal.show>
            <x-slot:id>
                {{ 'venta-' . $venta['id'] }}
            </x-slot:id>

            <x-slot:name>
                {{ 'Productos vendidos el ' . ' ' . $venta['fecha'] . ' ' . ' por '. ' ' . $venta['nombreMesero']}}
            </x-slot:name>

            {{-- <x-slot:filter></x-slot:filter> --}}

            <div class="">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Producto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venta['productos'] as $producto)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $producto['cantidad'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $producto['nombre'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $producto['precio'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $producto['total'] }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </x-modal.show>
    @endforeach

</x-app>
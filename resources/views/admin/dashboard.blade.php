<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
        </x-slot>

        <x-slot:title>
            Dashboard
            </x-slot>

            @php
            $productMV = null;
            $maxCounter = 0;
            @endphp

            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="grid grid-cols-3 gap-4 place-items-stretch h-56 ">

                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        {{--a traves del contador se muestra el producto mas vendido--}}
                        @foreach ($products as $product)
                        @if ($product['contador'] > $maxCounter)
                        @php
                        $productMV = $product;
                        $maxCounter = $product['contador'];
                        @endphp
                        @endif
                        @endforeach

                        @if ($productMV)
                        @php
                        $productMVName = $productMV['nombre'];
                        @endphp
                        El producto más vendido es: <br>
                        {{ $productMVName }}
                        @endif
                    </div>
                    <div class=" object-fill ">
                        {{-- Grafica de barras de empleados por rol--}}
                        @livewire('dashboard', ['roles' => $roles, 'employees' => $employees]) {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}


                    </div>

                    <div class="object-fill">
                        {{-- Grafica de horizontal de empleados activos o inactivos--}}
                        @livewire('grafica-estado', ['employees' => $employees])
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 place-items-stretch h-56 ">
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        {{--recupera el total vendido en el dia actual, se compra el total d elas ventas que existen en el dia con la fecha actual--}}
                        @php
                        $sumaTotal = 0; 
                        $fechaActual = date('Y-m-d');   
                        @endphp
                        @foreach($ventas as $venta)
                            @if($venta['fecha'] == $fechaActual)
                                @php
                                $sumaTotal += $venta['total'];
                                @endphp
                            @endif
                        @endforeach
                        Total de venta del día es: <br>
                        {{ $sumaTotal }}
                    </div>
                    
                    
                    <div class=" object-fill ">
                        {{-- Grafica circular de prodcutos por categoria--}}
                        @livewire('grafica-c', ['categories' => $categories, 'products' => $products]) {{-- Lamo el componente de livewire y le paso los roles a la propiedad roles del componente --}}
                    </div>
                    <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                        {{-- Grafica picos de prodcutos por top de acuerdo al contador--}}
                        @livewire('grafica-top', ['categories' => $categories, 'products' => $products])
                    </div>
                </div>
            </div>

</x-app>

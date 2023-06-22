<div>
    <div
        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4">
        {{--  aqui empiezaa el boton para corte de caja  --}}
        <div class="w-full md:w-1/2">
            <div class="flex items-center">
                <button type="button" id="modalToggleButton" data-modal-target="modalContent" data-modal-toggle="modalContent" 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                    Generar corte de caja
                </button>
            </div>
        </div>
        <div id="modalContent"  tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalContent">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    
                    <div id="contenidoModal" class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Ingresos
                                        <th>
                                        <?php
                                        
                                        $totalVentas = 0;
                                        foreach($ventas as $venta){
                                            if($venta['fecha']==$fechaActual)
                                            $totalVentas += $venta["total"];
                                        }
                                        echo "$" . $totalVentas;
                                        ?>
                                    </th>
                                    </th>
                                </tr>
                                <tr>
                                    
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                        CONCEPTO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DESCRIPCIÓN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        CATEGORÍA
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        MONTO
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $pagos)
                                @if($pagos['fecha']==$fechaActual)
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$pagos['nombre']}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$pagos['descripcion']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{$pagos['pago']}}
                                    </td>
                                </tr>
                                @endif
                                @endforeach          
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" class="px-6 py-3 text-base">Total de Pagos</th>
                                    <td class="px-6 py-3">
                                        <?php
                                        $totalPagos = 0;
                                        foreach($payments as $pagos){
                                        if($pagos['fecha']==$fechaActual){
                                        
                                            $totalPagos += $pagos['pago'];
                                        }
                                    }
                                        echo "$" . $totalPagos;
                                        ?>
                                    </td>
                                </tr>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">Total del dia</th>
                                    <td class="px-6 py-3">
                                        <?php
                                        $totalDia = $totalVentas - $totalPagos;
                                        echo "$" . $totalDia;
                                        ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <form id="pdfForm" action="{{ route('reporteCaja') }}" method="GET" target="_blank" class="flex">
                            <button id="acceptButton" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                ACEPTAR
                            </button>
                        </form>
                        
                        <button data-modal-hide="modalContent" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>                    
                </div>
            </div>
        </div>

        <div
            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
            {{-- boton para generar reportes a traves de una fecha seleccionada  --}}
            <div class="flex items-center">
                <p>Selecciona una fecha:</p>
                <form action="reporte" method="GET" target="_blank" class="flex" onsubmit="return validarFormulario()">
                    <div>   
                        <input id="datePickerId" type="date" name="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      </div>
                    <div class="m-2"></div> 
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                        Generar Reporte
                      </button>
                </form>
            </div>

            <button id="DropdownButtonFilters" data-dropdown-toggle="dropdown-filters"
                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                type="button">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-1.5 -ml-1 text-gray-400"
                    viewbox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                        clip-rule="evenodd" />
                </svg>
                Opciones de Filtro
                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                </svg>
            </button>
        </div>
    </div>

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
            @forelse($filteredSales as $venta)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $venta['id'] }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $venta['fecha'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $venta['nombreMesero'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $venta['nombreMesa'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $venta['total'] }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <button id="ver-button" type="button" data-drawer-target="drawer-read-venta-{{ $venta['id'] }}-advanced"
                                data-drawer-show="drawer-read-venta-{{ $venta['id'] }}-advanced"
                                aria-controls="drawer-read-venta-{{ $venta['id'] }}-advanced"
                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4 mr-2 -ml-0.5">
                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                </svg>
                                Ver
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <td colspan="4" class="px-6 py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 rounded-full">
                                <img class="w-8 h-8 rounded-full" src="{{ Storage::url('public/images/info.png') }}"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    No hay ventas
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    ¿Esta seguro de su busqueda?
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
    
    <!-- Dropdown menu para botones de busqueda-->
    <div id="dropdown-filters"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="DropdownButtonFilters">
            <li>
                <button id="DropdownButtonMesero" data-dropdown-toggle="dropdown-filters-mesero"
                    data-dropdown-placement="right-start" type="button"
                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mesero<svg
                        aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="dropdown-filters-mesero"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="DropdownButtonCategories">
                        @foreach ($empleados as $empleado)
                            @if ($empleado['rolName'] == 'Mesero')
                            <li class="flex items-center">
                                <button type="button"
                                    wire:click="$set('filter_mesero', '{{ $empleado['nombre'] }}')"
                                    class="w-full flex items-center p-2 {{ $filter_mesero == $empleado['nombre'] ? 'bg-gray-100 dark:bg-gray-700 text-gray-900  dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800' : 'text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                    <span class="ml-3">{{$empleado['nombre']}}</span>
                                </button>
                            </li>
                            @endif
                        @endforeach


                    </ul>
                </div>
            </li>
            <li>
                <button id="DropdownButtonMesa" data-dropdown-toggle="dropdown-filters-mesa"
                    data-dropdown-placement="right-start" type="button"
                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mesa<svg
                        aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="dropdown-filters-mesa"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="DropdownButtonCategories">
                        @foreach ($mesas as $mesa)
                            <li class="flex items-center">
                                <button type="button" 
                                wire:click="$set('filter_mesa', '{{ $mesa['nombre'] }}')"
                                class="w-full flex items-center p-2 {{ $filter_mesa == $mesa['nombre'] ? 'bg-gray-100 dark:bg-gray-700 text-gray-900  dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800' : 'text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                    <span class="ml-3">{{ $mesa['nombre'] }}</span>
                                </button>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </li>
        </ul>
        <div class="py-1">
            <button type="button" wire:click="clear" 
                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <span class="ml-3">Eliminar filtros</span>
            </button>
        </div>
    </div>
            
</div>
<!--  Para que no se puedan seleccionar fechas futuras a la actual  -->
    <!----  validar antes de enviar el form a la ruta reporte  -->

<script>
    datePickerId.max = new Date().toISOString().split("T")[0]; 
    
    function validarFormulario() {
        var fechaSeleccionada = document.getElementById('datePickerId').value;
        var arrayVentas = <?php echo json_encode($ventas); ?>; // Asigna los datos de ventas desde PHP

        var filteredVentas = [];
        var flag = false;

        for (var i = 0; i < arrayVentas.length; i++) {
            if (fechaSeleccionada && fechaSeleccionada === arrayVentas[i]['fecha']) {
                filteredVentas.push(arrayVentas[i]);
                flag = true;
            }
        }

        if (flag) {
            return true; // Si flag es true, se enviará el formulario
        } else {
            // Realiza alguna acción si la fecha no cumple con la validación
            alert('La fecha seleccionada no coincide con ninguna venta.');
            return false; // Si flag es false, el formulario no se enviará
        }
    }
</script>
<script>
    const acceptButton = document.getElementById('acceptButton');
    const pdfForm = document.getElementById('pdfForm');

    acceptButton.addEventListener('click', () => {
        pdfForm.submit();
    });
</script>
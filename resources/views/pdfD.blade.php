<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 6px;
            /* Tamaño de letra ajustado */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1px;
            text-align: left;
            /*  border-bottom: 1px solid #ddd;*/
            /*quitar linea o poner lineas en salto*/
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .code128 {
            width: 70px;
            height: 20px;
            text-align: center;
            border: 1px solid #000;
        }

        @page {
            margin: 0;
            padding: 0;
            size: 50mm 80mm;
            /* Tamaño de papel en milímetros */
        }

        body {
            margin: 0;
            padding: 0;
        }

    </style>
</head>

<body>
    @php
    $total = 0; // Variable para almacenar el total
    @endphp
    <table>
        <tr>
            <td colspan="4" class="center bold">La Huatulqueña Restaurante</td>
        </tr>
        <tr>
            <td colspan="4" class="center">RUC: 0000000000</td>
        </tr>
        <tr>
            <td colspan="4" class="center">Bahia de San Agustin, Santa María Huatulco, Oax.</td>
        </tr>
        <tr>
            <td colspan="4" class="center">Teléfono: 00000000</td>
        </tr>
        <tr>
            <td colspan="4" class="center">Email: correo@ejemplo.com</td>
        </tr>
        <tr>
            <td colspan="4" class="center">------------------------------------------------------</td>
        </tr>
        <tr>
            <td class="bold">Fecha y Hora:</td>
            <td>
                {{--recuperar la fecha y hora relacionando el id de cuenta con el id de la orden--}}
                @foreach ($orden as $ordenIndividual) 
                @foreach ($cuenta as $cuentaUnica)
                @if ($cuentaUnica['id'] == 1 && $ordenIndividual['id'] == $cuentaUnica['id'])
                    {{ $ordenIndividual['fechaYhora'] }}
                @endif
                @endforeach
            @endforeach
            </td>
            
        </tr>
        
        <tr>
            <td class="bold">Mesa No.</td>
            <td> 
                {{--recuperar el nombre de la mesa del pedido 1 {este valor es de ejemplo, aun no se enlaza}--}}
                @foreach ($tables as $table)
                    @foreach ($orden as $ordenIndividual) 
                    @foreach ($cuenta as $cuentaUnica)         
                        @if ($cuentaUnica['id'] == 1 && $ordenIndividual['id'] == $cuentaUnica['id'] && $table['id'] == $ordenIndividual['id_Mesa'])
                            {{ $table['nombre'] }}
                        @endif
                    @endforeach
                    @endforeach
                @endforeach
            </td>
            
        </tr>
        <tr>
            <td class="bold">Mesero:</td>
            <td colspan="4">
                {{-- Recupera el nombre del mesero que atendió esa cuenta --}}
                @foreach ($employees as $employee)
                    @foreach ($orden as $ordenIndividual)
                        @foreach ($cuenta as $cuentaUnica)
                            @if ($cuentaUnica['id'] == 1 && $ordenIndividual['id_Mesa'] == $cuentaUnica['idMesa'] && $employee['id'] == $ordenIndividual['id_Mesa'])
                                {{ $employee['nombre'].' '.$employee['apellidos'] }}
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </td>
        </tr>
        
        {{--  <tr>
            <td class="bold">Mesero:</td>
            <td colspan="4">  --}}
                {{-- Recupera el nombre del mesero que atendió esa cuenta --}}
                {{--  @foreach ($employees as $employee)
                    @foreach ($orden as $ordenIndividual)
                        @foreach ($cuenta as $cuentaUnica)
                            @if ($cuentaUnica['id'] == 1 && $ordenIndividual['id_Mesa'] == $cuentaUnica['idMesa'] && $employee['id'] == $table['idEmpleado'])
                                {{ $employee['nombre'].' '.$employee['apellidos'] }}
                                @break 3
                            @endif
                        @endforeach
                    @endforeach
                @endforeach  --}}
            {{--  </td>
        </tr>
          --}}

        
        
        <tr>
            <td colspan="4" class="center bold">Pedido  
                @foreach ($orden as $ordenIndividual) 
                @foreach ($cuenta as $cuentaUnica)
                @if ($cuentaUnica['id'] == 1 && $ordenIndividual['id'] == $cuentaUnica['idMesa'])
                   Nro: {{$ordenIndividual["id"]}}                      
                @endif
            @endforeach
            @endforeach</td>
            
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            <th>Cant.</th>
            <th>Precio Uni</th>
            <th>Producto.</th>
            <th>Total</th>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            @foreach($products as $product)
            @foreach ($cuentafinal['cuenta '] as $pedi)
            @if($product['id'] == $pedi['idproducto'])

        <tr>
            <th>
                {{ $pedi['cantidad'] }}
            </th>
            <td>
                {{ $pedi['precio'] }}
            </td>
            <td>
                {{ $product['nombre'] }}
            </td>
            <td>
                {{ $pedi['total'] }}</td>
            <td>

                @php
               
                $total += $pedi['total'] ;
                $montoPagado = 2000; // total pagado dato de prueba 

                $cambio = $montoPagado - $total;
                @endphp
                {{--  ${{ $subtotal }}  --}}
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach
        </tr>

        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">TOTAL A PAGAR</td>
            <td> ${{ $total }} USD</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">TOTAL PAGADO</td>
            <td>${{ $montoPagado }} MX;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">CAMBIO</td>
            <td>${{ $cambio }} MX</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center">*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o
                devolución debe de presentar este ticket ***</td>
        </tr>
        <tr>
            <td colspan="4" class="center bold">Gracias por su compra</td>
        </tr>
    </table>
</body>

</html>

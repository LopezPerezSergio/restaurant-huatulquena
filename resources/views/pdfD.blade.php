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

        .titulos {
            text-align: center;
            margin: 15;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
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
    $idMesaPedido= '';
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
        <tr class="center">
            <td class="titulos">Fecha y Hora:</td>
            <td colspan="4">
                @foreach ($orden as $pedido)
                @foreach ($tables as $mesa)
                @foreach ($cuenta as $cuentaUnica)
                @if ($mesa['id'] == $pedido['id_Mesa'] && $message == $mesa['id'] && $pedido['id'] == $cuentaUnica['id'])
                {{ $pedido['fechaYhora'] }}
                @endif
                @endforeach
                @endforeach
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="titulos">Mesa No.</td>
            <td>
                @foreach ($orden as $pedido)
                @foreach ($tables as $mesa)
                @if ($mesa['id'] == $pedido['id_Mesa'] && $message == $mesa['id'])
                {{$mesa['nombre']}}
                @endif
                @endforeach
                @endforeach
            </td>
        <tr>
            <td class="titulos">Mesero:</td>
            <td colspan="4">
                {{-- Recupera el nombre del mesero que atendió esa cuenta --}}
                @foreach ($employees as $employee)
                @foreach ($orden as $pedido)
                @foreach ($tables as $mesa)
                @if ($mesa['id'] == $pedido['id_Mesa'] && $message == $mesa['id'] && $employee['id'] ==
                $pedido['id_Mesa'])
                {{$employee['nombre']}}
                @endif
                @endforeach
                @endforeach
                @endforeach
            </td>
        </tr>

        <tr>
            <td colspan="4" class="center bold">Pedido
                @foreach ($orden as $pedido)
                @foreach ($tables as $mesa)
                @foreach ($cuenta as $cuentaUnica)
                @if ($mesa['id'] == $pedido['id_Mesa'] && $message == $mesa['id'] && $pedido['id'] ==
                $cuentaUnica['id'])
                Nro: {{$pedido["id"]}}
                @endif
                @endforeach
                @endforeach
                @endforeach

        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr class="center">
            <th class="center">Cant.</th>
            <th class="center">Precio Uni</th>
            <th class="center">Producto.</th>
            <th class="center">Total</th>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            @foreach($products as $product)
            @foreach ($cuentafinal['cuenta '] as $pedi)
            @if($product['id'] == $pedi['idproducto'])

        <tr>
            <th class="center">
                {{ $pedi['cantidad'] }}
            </th>
            <td class="center">
                {{ $pedi['precio'] }}
            </td>
            <td class="center">
                {{ $product['nombre'] }}
            </td>
            <td class="center">
                {{ $pedi['total'] }}</td>
            <td>

                @php

                $total += $pedi['total'] ;
                $montoPagado = 2000; // total pagado dato de prueba

                $cambio = $montoPagado - $total;
                @endphp
                {{-- ${{ $subtotal }} --}}
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
            <td colspan="4" class="center">*** Precios de productos incluyen impuestos. Para cualquier aclaración debe
                de presentar este ticket ***</td>
        </tr>
        <tr>
            <td colspan="4" class="center bold">Gracias por su compra</td>
        </tr>
    </table>
</body>

</html>
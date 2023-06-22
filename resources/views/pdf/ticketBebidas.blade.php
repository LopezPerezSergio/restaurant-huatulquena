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

        .descripcion {
            text-align: right;
            margin-left: 80%;
            font-size: 80%;
            font-style: italic;
        }

        .bold {
            font-weight: bold;
        }

        .titulos {
            text-align: center;
            margin: 15;
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
    <table>
        <br>
        <tr>
            <td colspan="4" class="center bold">LA HUATULQUEÑA </td>
        </tr>
        <tr>
            <td colspan="4" class="center bold" style="font-size:5px;">PARA MARISCOS, EN HUATULCO SOLO LO MEJOR </td>
        </tr>
        <tr>
            {{-- <td colspan="4" class="center">RUC: 0000000000</td> --}}
            <td colspan="4" class="center">RFC: LFE150811SK5</td>
        </tr>
        <tr>
            <td colspan="4" class="center">Bahia de San Agustin, Santa María Huatulco, Oax. c.p. 70980</td>
        </tr>
        <tr>
            <td colspan="4" class="center">Teléfono: 958-589-3570</td>
        </tr>
        <tr>
            <td colspan="4" class="center">Email: huatulqueña0622@gmail.com</td>
        </tr>
        <tr>
            <td colspan="4" class="center">---------------------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td class="titulos">Pedido: </td>
            <td>
                {{ $idTable }}
            </td>
            {{-- <td class="titulos">Fecha y Hora:</td> --}}
            <td colspan="5" style="text-align: right; padding-right: 15px;">
                {{ date('Y/m/d H:i') }}
            </td>
        </tr>
        <tr>
            <td class="titulos">Mesa: </td>
            <td>
                {{ $table }}
            </td>
        <tr>
            <td class="titulos"  style="padding-left: 3px;">Atendido por: </td>
            <td colspan="2">
                {{--  Recupera el nombre del mesero que atendió esa mesa --}}
                {{ $employee }}
            </td>

        </tr>
        <br>
       <tr>
       <td class="center" style="font-size: 80%; font-style: italic;" colspan="10">**TICKET ORDINARIO PARA COCINA**</td>
       </tr> 
        <br>

        <tr>
            <td colspan="4" class="center">---------------------------------------------------------------------------------</td>
        </tr>

        <tr class="center">
            <th class="center" style="padding-left: 30px;">Cant.</th>
            <th class="center" style="padding-left: 20px;">Producto</th>
            <th class="center" style="padding-left: 20px;">Tamaño</th>
        </tr>

        <tr>
            <td colspan="4" class="center">---------------------------------------------------------------------------------</td>
        </tr>

        <tr>
            @foreach ($products as $product)
                @foreach ($imprimirProductosBebidas as $pedidoArray)
                    @if ($pedidoArray['id_producto'] == $product['id'])
        <tr>
            <td class="center" style="padding-left: 30px;">
                {{ $pedidoArray['cantidad'] }}
            </td>
            <td class="center" style="padding-left: 20px;">
                {{ $product['nombre'] }}
            </td>
            <td class="center" style="padding-left: 20px;">
                @if ($product['tamanio'] == 'S')
                         Chico
                     @endif
                     @if ($product['tamanio'] == 'M')
                         Mediano
                     @endif
                     @if ($product['tamanio'] == 'L')
                         Grande
                     @endif
                     @if ($product['tamanio'] == 'XL')
                         Familiar
                     @endif
            </td>
        </tr>
        <tr>
            <td class="descripcion" colspan="3">
                {{ $pedidoArray['descripcion'] }}
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach
        </tr>

        
    </table>
</body>

</html>
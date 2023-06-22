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
            $idMesaPedido = '';
            $totalProductos = 0;
        @endphp

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
                <td colspan="4" class="center">--------------------------------------------------------------------</td>
            </tr>
            <tr>
                <td class="titulos">Cuenta: </td>
                <td>
                    {{ $idCuenta }}
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
                <td class="titulos">Atendido por: </td>
                <td>
                    {{--  Recupera el nombre del mesero que atendió esa mesa --}}
                    {{ $employee }}
                </td>

            </tr>
            <br>
            <br>

            <tr class="center">
                <th class="center">Uds.</th>
                <th class="center">Producto</th>
                <th class="center">Precio</th>
                <th class="center">Total</th>
            </tr>
            <tr>
                <td colspan="4" class="center">
                    ---------------------------------------------------------------------------------</td>
            </tr>
            <tr>
                @foreach ($products as $product)
                    @foreach ($cuentafinal['cuenta '] as $pedi)
                        @if ($product['id'] == $pedi['idproducto'])
                            <tr>
                                <th class="center">
                                    {{ $pedi['cantidad'] }}
                                </th>
                                <td class="center">
                                    {{ $product['nombre'] }}
                                </td>
                                <td class="center">
                                    $ {{ $pedi['precio'] }}.00 
                                </td>
                                <td class="center">
                                    ${{ $pedi['total'] }}.00</td>
                                <td>
                                    @php
                                        $total += $pedi['total'];
                                        $totalProductos += $pedi['cantidad'];
                                    @endphp
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tr>

            <tr>
                <td colspan="4" class="center">
                    ---------------------------------------------------------------------------------</td>
            </tr>
            <tr>
                <td class=" text-align: center margin: 15 font-size: 5xpx ">
                    Uds({{ $totalProductos }})
                </td>
                <td colspan="1">&nbsp;</td>
                <td colspan="1" class="bold">TOTAL A PAGAR</td>
                <td> ${{ $total }}.00 MX</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4" class="center">*** Precios de productos incluyen impuestos. Para cualquier aclaración
                    debe
                    de presentar este ticket ***</td>
            </tr>
            <tr>
                <td colspan="4" class="center bold">Gracias por su compra</td>
            </tr>
        </table>
    </body>

</html>
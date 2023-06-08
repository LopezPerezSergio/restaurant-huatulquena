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
        <tr>
            <td colspan="4" class="center bold">La Huatulqueña Restaurante</td>
        </tr>
        <tr>
            <td colspan="4" class="center">------------------------------------------------------</td>
        </tr>

        <tr>
            <td class="titulos">Fecha y Hora:</td>
            <td>
                {{ date('Y-m-d') }}
            </td>
        </tr>
        <tr>
            <td class="titulos">Mesa:</td>
            <td>
                {{ $table }}
            </td>

        </tr>
        <tr>
            <td class="titulos">Mesero:</td>
            <td colspan="4">
                {{ $employee }}
            </td>
        </tr>

        <tr>
            <td colspan="4" class="center bold">Pedido
                @foreach ($orden as $ordenIndividual)
                @if ($ordenIndividual["id"] == 1)
                Nro: {{$ordenIndividual["id"]}}
                @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>

        <tr class="center">
            <th class="center">Cant.</th>
            <th class="center">Precio</th>
            <th class="center">Producto</th>
        </tr>
        
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <div class="products">
            <div class="product">
                <span class="product-quantity">Cantidad</span>
                <span class="product-description">
                    <span class="product-name">Platillo</span>
                    <span>Descripcion</span>
                </span>
            </div>
            <span>------------------------------------------</span>
            @foreach (Cart::content() as $product)
                <div class="product">
                    <span class="product-quantity">{{ $product->qty }}</span>
                    <span class="product-description">
                        <span class="product-name">{{ $product->name }}</span>
                        <span>{{ $product->options->description }}</span>
                    </span>
                </div>
            @endforeach
        </div>



        <tr>
            @foreach($products as $product)
            @foreach ($rutaP as $pedi)
            @if($product['id'] == $pedi['id_Producto'])

        <tr>
            <td class="center">
                {{ $pedi['cantidad'] }}
            </td>
            <td class="center">
                {{ $product['precio'] }}
            </td>
            <td class="center">
                {{ $product['nombre'] }}
            </td>
        </tr>
        <tr>
            <td class="descripcion" colspan="3">
                {{ $pedi['descripcion'] }}
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach
        </tr>

        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
    </table>
</body>

</html>

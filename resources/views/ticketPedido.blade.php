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
    <table>
        <tr>
            <td colspan="4" class="center bold">La Huatulqueña Restaurante</td>
        </tr>
        <tr>
            <td colspan="4" class="center">------------------------------------------------------</td>
        </tr>
        <tr>
            <td class="bold">Fecha y Hora:</td>
            <td colspan="4">
                {{--recuperar la fecha y hora del pedido con id=1 ejemplo--}}
                
                @foreach ($orden as $ordenIndividual) 
                    @if ($ordenIndividual["id"] == 1)
                       {{$ordenIndividual["fechaYhora"]}}                      
                    @endif
                @endforeach
                
            </td>
        </tr>
        <tr>
            <td class="bold">Mesa No.</td>
            <td> 
                {{--recuperar el nombre de la mesa del pedido 1 {este valor es de ejemplo, aun no se enlaza}--}}
                @foreach ($tables as $table)
                    @foreach ($orden as $ordenIndividual)          
                        @if ($ordenIndividual['id'] == 1 && $table['id'] == $ordenIndividual['id_Mesa'])
                            {{ $table['nombre'] }}
                        @endif
                    @endforeach
                @endforeach
            </td>
            
        </tr>
        <tr>
            <td class="bold">Mesero:</td>
            <td colspan="4">
                {{--recupera el nombre del mesero  que atendio esa orden de acuerdo al id_mesa que esta en el id del pedido
                    se toma de ejemplo el id=1 que se encuentra en /orden--}}
                @foreach ($employees as $employee)
                    @foreach ($orden as $ordenIndividual)
                        @if ($ordenIndividual['id'] == 1 && $employee['id'] == $ordenIndividual['id_Mesa'])
                            {{ $employee['nombre'].' '.$employee['apellidos'] }}
                        @endif
                    @endforeach
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="4" class="center bold">Pedido </td>
            <td colspan="2">
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
        <tr>
            <th>Cant.</th>
            <th>Precio</th>
            <th>Producto.</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            @foreach($products as $product)
            @foreach ($rutaP as $pedi)
            @if($product['id'] == $pedi['id_Producto'])

        <tr>
            <th>
                {{ $pedi['cantidad'] }}
            </th>
            <td>
                {{ $product['precio'] }}
            </td>
            <td>
                {{ $product['nombre'] }}
            </td>
            <td>
                {{ $pedi['descripcion'] }}</td>
            
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

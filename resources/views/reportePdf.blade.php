<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reporte de Ventas</title>
    <style>
        /* Estilos CSS para la tabla */
        /* contenedor para el titulo*/
        .titulo-container {
            background-color: rgba(43, 43, 219, 0.555);
            padding: 1px;
            text-align: center;
            color: white;
        }
        
        body {
           /** background-image: url('{{ asset("storage/images/logoHuatulqueña.png") }}');**/
            background-repeat: no-repeat;
            background-size: cover;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    {{--se recupera la fecha seleccionada y se separa para darle estilos al reporte--}}
    @php
    $dia = date('d', strtotime($fechaSeleccionada));
    /*para evitar instalar carbon, ya que solo me muestra en ingles el mes*/
    $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];
    $mes = $meses[date('n', strtotime($fechaSeleccionada))];
    $anio = date('Y', strtotime($fechaSeleccionada));
    @endphp

    <div class="titulo-container">
        <h1>Reporte de Ventas</h1>
    </div>
    <h2>Fecha del reporte: {{ $dia }} de {{ $mes }} de {{ $anio }}</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>MESA</th>
                <th>MESERO</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalGeneral = 0;
            @endphp
            @foreach($filteredVentas as $venta)
                <tr>
                    <td>{{ $venta['id'] }}</td>
                    <td>{{ $venta['fecha'] }}</td>
                    <td>{{ $venta['nombreMesa'] }}</td>
                    <td>{{ $venta['nombreMesero'] }}</td>
                    <td>{{ $venta['total'] }}</td>
                </tr>
                @php
                $totalGeneral += $venta['total'];
                @endphp
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Total General:</strong></td>
                <td>{{ $totalGeneral }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

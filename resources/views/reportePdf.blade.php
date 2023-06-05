<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Ventas</title>
    <style>
        /* Estilos CSS para la tabla */
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
    <h1>Reporte de Ventas</h1>
    <h2>Fecha del reporte: {{$fechaSeleccionada}}</h2>
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
            @foreach($filteredOrders as $orden)
                <tr>
                    <td>{{ $orden['id'] }}</td>
                    <td>{{ $orden['fecha'] }}</td>
                    <td>{{ $orden['nombreMesa'] }}</td>
                    <td>{{ $orden['nombreMesero'] }}</td>
                    <td>{{ $orden['total'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

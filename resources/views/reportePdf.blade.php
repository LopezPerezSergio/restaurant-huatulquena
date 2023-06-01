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

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Id Mesa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filteredOrders as $orden)
                <tr>
                    <td>{{ $orden['id'] }}</td>
                    <td>{{ $orden['fechaYhora'] }}</td>
                    <td>{{ $orden['id_Mesa'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

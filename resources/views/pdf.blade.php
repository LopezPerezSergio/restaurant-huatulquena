<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        @page {
            size: 55mm, 80mm;
            margin: 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
        }
        
        .border-b {
            border-bottom: 1px solid #ddd;
        }
        
        .highlight {
            background-color: #f5f5f5;
        }
        
        .active {
            background-color: #c8e6c9;
        }
        
        .inactive {
            background-color: #ffcdd2;
        }
        
        .green {
            color: green;
        }
        
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <div style="width: 210mm; height: 297mm; margin: 0 auto;">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Sueldo</th>
                    <th>Estatus</th>
                    <th>Código de Acceso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="border-b {{ $loop->odd ? 'highlight' : '' }}">
                        <td>{{ $employee['nombre'] . ' ' . $employee['apellidos'] }}</td>
                        <td>{{ $employee['telefono'] }}</td>
                        <td>{{ $employee['rolName'] }}</td>
                        <td>${{ $employee['sueldo'] }}</td>
                        <td class="{{ $employee['status'] == '1' ? 'active green' : 'inactive red' }}">
                            {{ $employee['status'] == '1' ? 'Activo' : 'Inactivo' }}
                        </td>
                        <td>{{ $employee['codigoAcceso'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>



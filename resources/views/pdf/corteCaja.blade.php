<!DOCTYPE html>
<html lang="es">
<head>
    <title>CORTE DE CAJA</title>
    <style>
        /* Estilos CSS para la tabla */
        /* contenedor para el titulo */
        .titulo-container {
            background-color: rgba(43, 43, 219, 0.555);
            padding: 1px;
            text-align: center;
            color: white;
        }

        body {
            /* background-image: url('{{ asset("storage/images/logoHuatulqueña.png") }}'); */
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
            text-align: center;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <?php
    $fechaActual = date('Y-m-d');
    $dia = date('d', strtotime($fechaActual));
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
    $mes = $meses[date('n', strtotime($fechaActual))];
    $anio = date('Y', strtotime($fechaActual));
    ?>

    <div class="titulo-container">
        <h1>CORTE DE CAJA</h1>
    </div>

    <h2>Fecha del corte de Caja: <?php echo $dia; ?> de <?php echo $mes; ?> de <?php echo $anio; ?></h2>
    <table>
        <thead>
            <tr>
                <th colspan="4" style="text-align: right;">Ingresos del día</th>
                <td style="text-align: right;">
                    <?php
                    $totalVentas = 0;
                    foreach($ventas as $venta){
                        if($venta['fecha'] == $fechaActual)
                            $totalVentas += $venta["total"];
                            $valorFormateado = number_format($totalVentas, 2);       
                    }
                    echo "$" . $valorFormateado ." MX";
                    ?>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                <th>CONCEPTO</th>
                <th>DESCRIPCIÓN</th>
                <th>CATEGORÍA</th>
                <th>MONTO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($payments as $pagos): ?>
            <?php if($pagos['fecha'] == $fechaActual): ?>
            <tr>
                <td><?php echo $pagos['id']; ?></td>
                <td><?php echo $pagos['nombre']; ?></td>
                <td> @if(is_numeric($pagos['descripcion']))
                    @php
                    $variable = 'Nomina';
                    @endphp
                @else
                    @php
                    $variable = $pagos['descripcion'];
                    @endphp
                @endif

                {{$variable}}</td>
                <td>
                    @php
                    $descripcion = 'Otros Pagos';
                
                    foreach ($empleados as $nombreEmpleado) {
                        if ($pagos['nombre'] == $nombreEmpleado['nombre']) {
                            $descripcion = 'Pago Empleado';
                            break; // Agrega un break para salir del bucle una vez que se haya encontrado el empleado
                        } elseif ($pagos['nombre'] == 'Agua' || $pagos['nombre'] == 'Luz') {
                            $descripcion = 'Pago de servicios';
                        }
                    }
                    @endphp
                
                    {{$descripcion}}</td>
                <td style="text-align: right;">
                    <?php 
                    $valorFormateado = number_format($pagos['pago'], 2);
                    echo "$" . $valorFormateado." MX"; ?>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align: right;">Total de Pagos</th>
                <td style="text-align: right;">
                    <?php
                    $totalPagos = 0;
                    foreach($payments as $pagos){
                        if($pagos['fecha'] == $fechaActual){
                            $totalPagos += $pagos['pago'];
                            $valorFormateado = number_format($totalPagos, 2, '.', ',');
                        }
                    }
                    echo "$" . $valorFormateado. " MX";
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="4" style="text-align: right;">Total del día</th>
                <td style="text-align: right;">
                    <?php
                    $totalDia = $totalVentas - $totalPagos;
                    $valorFormateado = number_format($totalDia, 2, '.', ',');
                    echo "$" . $valorFormateado." MX";
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

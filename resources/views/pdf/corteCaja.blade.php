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
            text-align: left;
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
                <td>
                    <?php
                    $totalVentas = 0;
                    foreach($ventas as $venta){
                        if($venta['fecha'] == $fechaActual)
                            $totalVentas += $venta["total"];
                    }
                    echo "$" . $totalVentas;
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
                <td><?php echo $pagos['descripcion']; ?></td>
                <td><?php echo "soy una categoria" ?></td>
                <td><?php echo "$" . $pagos['pago']; ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align: right;">Total de Pagos</th>
                <td>
                    <?php
                    $totalPagos = 0;
                    foreach($payments as $pagos){
                        if($pagos['fecha'] == $fechaActual){
                            $totalPagos += $pagos['pago'];
                        }
                    }
                    echo "$" . $totalPagos;
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="4" style="text-align: right;">Total del día</th>
                <td>
                    <?php
                    $totalDia = $totalVentas - $totalPagos;
                    echo "$" . $totalDia;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

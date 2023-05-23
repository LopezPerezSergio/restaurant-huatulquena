<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2" class="center bold">Nombre de empresa</td>
        </tr>
        <tr>
            <td colspan="2" class="center">RUC: 0000000000</td>
        </tr>
        <tr>
            <td colspan="2" class="center">SECTOR L</td>
        </tr>
        <tr>
            <td colspan="2" class="center">Teléfono: 00000000</td>
        </tr>
        <tr>
            <td colspan="2" class="center">Email: correo@ejemplo.com</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="center">------------------------------------------------------</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="bold">Fecha:</td>
            <td>'.date("d/m/Y h:i A", strtotime("13-09-2022")).'</td>
        </tr>
        <tr>
            <td class="bold">Caja Nro:</td>
            <td>1</td>
        </tr>
        <tr>
            <td class="bold">Cajero:</td>
            <td>Carlos Alfaro</td>
        </tr>
        <tr>
            <td colspan="2" class="center bold">Ticket Nro: 1</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="center">------------------------------------------------------</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="bold">Cliente:</td>
            <td>Carlos Alfaro</td>
        </tr>
        <tr>
            <td class="bold">Documento:</td>
            <td>DNI 00000000</td>
        </tr>
        <tr>
            <td class="bold">Teléfono:</td>
            <td>00000000</td>
        </tr>
        <tr>
            <td class="bold">Dirección:</td>
            <td>Santa Maria Huatulco,Oaxaca</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            <th>Cant.</th>
            <th>Precio</th>
            <th>Desc.</th>
            <th>Total</th>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td>7</td>
            <td>$10 USD</td>
            <td>$0.00 USD</td>
            <td>$70.00 USD</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">Garantía de fábrica: 2 Meses</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">SUBTOTAL</td>
            <td>+ $70.00 USD</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">IVA (13%)</td>
            <td>+ $0.00 USD</td>
        </tr>
        <tr>
            <td colspan="4" class="center">-------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">TOTAL A PAGAR</td>
            <td>$70.00 USD</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">TOTAL PAGADO</td>
            <td>$100.00 USD</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">CAMBIO</td>
            <td>$30.00 USD</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="bold">USTED AHORRA</td>
            <td>$0.00 USD</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center">*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***</td>
        </tr>
        <tr>
            <td colspan="4" class="center bold">Gracias por su compra</td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="center code128">COD000001V0001</td>
        </tr>
        <tr>
            <td colspan="4" class="center">COD000001V0001</td>
        </tr>
    </table>
</body>
</html>
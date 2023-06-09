<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket</title>

    <style>
        body {
          width: 80mm; /* Ancho del ticket */
          height: 100mm; /* Alto del ticket */
          margin: 5mm; /* Márgenes del ticket */
          padding: 0;
          font-family: Arial, sans-serif;
          font-size: 10pt;
        }
    
        .header {
          text-align: center;
          margin-bottom: 10px;
        }
    
        table {
          width: 100%;
          border-collapse: collapse;
        }
    
        th, td {
          border: 1px solid black;
          padding: 5px;
        }
      </style>
</head>

<body>
    <div class="header">
        <h1>Ticket de Pedido</h1>
    </div>

    <div class="order-details">
        <p><strong>Mesa:</strong> {{ $table }}</p>
        <p><strong>Fecha:</strong> {{ date('Y-m-d') }}</p>
        <p><strong>Empleado:</strong> {{ $employee }}</p>
    </div>    
   
      @foreach($rutaP as $pedi)
        @if($pedi['id_Pedido']== $idTable)
          
          {{ $pedi['cantidad'] }}
         
          {{ $pedi['descripcion'] }}
         
          {{ $pedi['id_Pedido'] }}
         
          {{ $pedi['id_Producto'] }}
          
      @endif
      @endforeach
   
</body>

</html>

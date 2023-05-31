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

    <div class="header">
        <h1>Ticket de Pedido</h1>
      </div>
      
      <table>
        <thead>
          <tr>
            <th>Cantidad</th>
            <th>Nombre</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>x2</td>
            <td>Producto 1</td>
            <td>Descripción del producto 1...</td>
          </tr>
          <tr>
            <td>x1</td>
            <td>Producto 2</td>
            <td>Descripción del producto 2...</td>
          </tr>
        </tbody>
      </table>
</body>

</html>

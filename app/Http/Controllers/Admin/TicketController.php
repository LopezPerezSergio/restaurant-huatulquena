<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pedido;
use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Pedido_Producto;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;


class TicketController extends Controller
{
    public function index()
    {
    }

    // funcion que genera el ticket final
    public function final($table)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        $user = session()->get('user');

        //Extraemos la mesa que estamos utilizando 
        $url = config('app.api') . '/table/' . $table;
        $response = Http::withToken($user['token'])->get($url);
        $tableA = $response->json('data');

        ///Obtenemos la lista de productos de la cuenta final 
        $url = config('app.api') . '/cuenta/items/' . $tableA['idCuenta'];
        $response = Http::withToken($user['token'])->get($url);
        $cuentafinal = $response->json('data');

        //obtenemos el empleado que atiende la mesa
        $url = config('app.api') . '/employee/search-id/' . $tableA['idEmpleado'];
        $response = Http::withToken($user['token'])->get($url);
        $employee = $response->json('data');

        //Obtenemos todos los productos
        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');
        
        //////////////////////////////////////////////////////////////

         //http://localhost:8080/cuenta/{id}       eliminar cuenta y por ende sus pedidos y pp
         $url = config('app.api') . '/cuenta/'. $tableA['idCuenta']  ;      
         $response = Http::withToken($user['token'])->delete($url);
        
        //Pasamos los datos a la vista para generar el PDF
        $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticketFinal', compact('cuentafinal', 'products'), [
            'table' => $tableA['nombre'],
            'idCuenta' => $tableA['idCuenta'],
            'employee' => $employee['nombre'] . ' ' . $employee['apellidos']

        ]);
        return $pdf->stream('Ticket');
    }

    //Ticket para proceso de pedidos
    public function ticketPedido($table)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $pedidos = Pedido::all();
        $pedidosArray = $pedidos->toArray();
        $pedidosProducto = Pedido_Producto::all();
        $pedidosProductoArray = $pedidosProducto->toArray();
        //dd($pedidosProductoArray);
        // dd($pedidosArray);

        $url = config('app.api') . '/table/' . $table;
        $response = Http::withToken($user['token'])->get($url);
        $tableA = $response->json('data');
        //dd($tableA);
        $url = config('app.api') . '/employee/search-id/' . $tableA['idEmpleado'];
        $response = Http::withToken($user['token'])->get($url);
        $employee = $response->json('data');

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');
        $pedidosArray = Pedido::where('id_cuenta', $tableA['idCuenta'])
            ->orderBy('fecha_yhora', 'desc')
            ->get()
            ->toArray();

        $pedidosMasActual = [];

        if (!empty($pedidosArray)) {
            $fechaMasActual = $pedidosArray[0]['fecha_yhora'];

            foreach ($pedidosArray as $pedido) {
                if ($pedido['fecha_yhora'] === $fechaMasActual) {
                    $pedidosMasActual[] = $pedido;
                } else {
                    break;
                }
            }
        }
        $idPedidosMasActual = array_column($pedidosMasActual, 'id');

        // Filtrar los productos que coinciden con los pedidos más actuales
        $imprimirProductos = [];

        foreach ($pedidosProductoArray as $pedidoProducto) {
            if (in_array($pedidoProducto['id_pedido'], $idPedidosMasActual)) {
                $imprimirProductos[] = $pedidoProducto;
            }
        }
        $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticketParcial', compact('imprimirProductos', 'products'), [
            'table' => $tableA['nombre'],
            'idTable' => $tableA['idCuenta'],
            'employee' => $employee['nombre'] . ' ' . $employee['apellidos']

        ]);

        return $pdf->stream('Ticket-Pedido');
    }
}

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
        
        return view('ticket');
    }


    // funcion que genera el ticket por pedido
    //     public function generateTicket()
    // {
    //     //recuperar datos 
    //     if (!session()->get('user')) {
    //         return redirect()->route('auth.login');
    //     }

    //     $user = session()->get('user');
    //     // $pedidos = Pedido::all();
    //     // $pedidosArray = $pedidos->toArray();
    //     // dd($pedidosArray);

    //     $url = config('app.api') . '/employee';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $employees = $response->json('data');

    //     $url = config('app.api') . '/table';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $tables = $response->json('data');

    //     $url = config('app.api') . '/product';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $products = $response->json('data');
    
    //     $url = config('app.api') . '/order';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $orden = $response->json('data');
    //     //dd($orden);
    //     $id=762;
    //     $url = config('app.api') . '/cuenta/items/'.$id;
    //     $response = Http::withToken($user['token'])->get($url);
    //     $cuentafinal = $response->json('data');
       
    //     dd($cuentafinal);
    //     $url = config('app.api') . '/order/product/pedido/'.$id;
    //     $response = Http::withToken($user['token'])->get($url);
    //     $rutaP = $response->json('data');

    //     // Crear una instancia de Dompdf
    //     $dompdf = new Dompdf();

    //     // Cargar la vista del ticket con los datos
    //     $html = view('ticketPedido',compact('rutaP','employees','id','products','orden','tables'))->render();

    //     // Cargar el contenido HTML en Dompdf
    //     $dompdf->loadHtml($html);

    //     // Establecer tamaño y orientación del papel
    //     $dompdf->setPaper([0, 0, 56.693, 90.718], 'portrait'); // Tamaño en milímetros (50mm x 80mm)

    //     // Renderizar el PDF
    //     $dompdf->render();

    //     // Mostrar el PDF en el navegador
    //     $dompdf->stream('Ticket_Pedido.pdf', ['Attachment' => false]);
    // }
    public function final($table)
    {
        
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        $user = session()->get('user');
        
        $url = config('app.api') . '/table/' . $table;
        $response = Http::withToken($user['token'])->get($url);
        $tableA = $response->json('data');

        $url = config('app.api') . '/employee/search-id/' . $tableA['idEmpleado'];
        $response = Http::withToken($user['token'])->get($url);
        $employee = $response->json('data');

        $cuenta=Cuenta::all();
        $cuentaArray = $cuenta->toArray();
         $cfArray = Cuenta::where('id', $tableA['idCuenta'])
         ->get()
         ->toArray();  
         //dd($cfArray);
        $id = $cuentaArray[0]['id'];
        //dd($id);
        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');

        $url = config('app.api') . '/order';
        $response = Http::withToken($user['token'])->get($url);
        $orden = $response->json('data');
        
        $url = config('app.api') . '/cuenta';
        $response = Http::withToken($user['token'])->get($url);
        $cuenta = $response->json('data');     
        $url = config('app.api') . '/cuenta/items/'.$id;
        $response = Http::withToken($user['token'])->get($url);
        $cuentafinal = $response->json('data');
        //dd($cuentafinal);
        $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticketFinal', compact('cuentafinal','products'),[
            'table' => $tableA['nombre'],
             'idTable' => $tableA['idCuenta'],
           'employee' => $employee['nombre'] . ' ' . $employee['apellidos']
          
       ]);
        return $pdf->stream('Ticket');
    }
    // public function geneTF($idAux3)
    // {
    //     //return $idAux2;
    //     if (!session()->get('user')) {
    //         return redirect()->route('auth.login');
    //     }
    //     //dd($idAux3);
    //     $user = session()->get('user');
        
    //     $url = config('app.api') . '/product';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $products = $response->json('data');

    //     $url = config('app.api') . '/order';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $orden = $response->json('data');
        
    //     $url = config('app.api') . '/cuenta';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $cuenta = $response->json('data');     
    //     //dd($cuenta);
    //     $url = config('app.api') . '/cuenta/items/762';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $cuentafinal = $response->json('data');
      
    
    //     $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticket', compact('cuentafinal','products'));
       

    //     return $pdf->stream('Ticket-Pedido-Final');
    // }
    //funcion que genera el ticket final a traves de datos de cuenta
    // public function generateTicketFinal($idAux2)
    // {
    //     //return $idAux2;
    //     if (!session()->get('user')) {
    //         return redirect()->route('auth.login');
    //     }
    //     //dd($idAux2);
    //     $user = session()->get('user');
    //     //dd($idAux2);
    //     $url = config('app.api') . '/product';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $products = $response->json('data');

    //     $url = config('app.api') . '/order';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $orden = $response->json('data');
        
    //     $url = config('app.api') . '/cuenta';
    //     $response = Http::withToken($user['token'])->get($url);
    //     $cuenta = $response->json('data');     
    //    // dd($cuenta);
    //     $url = config('app.api') . '/cuenta/items/'.$idAux2;
    //     $response = Http::withToken($user['token'])->get($url);
    //     $cuentafinal = $response->json('data');
    //    //($cuentafinal);
       

    //    //dd($cuentafinal);

    
    //     $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticketFinal', compact('cuentafinal','products'));
    //     // ,[
    //     //     //  'table' => $table['nombre'],
    //     //     //   'idTable' => $table['idCuenta'],
    //     //     // 'employee' => $employee['nombre'] . ' ' . $employee['apellidos']
           
    //     // ]);

    //     return $pdf->stream('Ticket-Pedido-Final');
    // }

    //ejemplo para proceso de venta
    public function ticketPedido($table)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $pedidos = Pedido::all();
        $pedidosArray = $pedidos->toArray();
        $pedidosProducto=Pedido_Producto::all();
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
        $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticketParcial', compact('imprimirProductos','products'),[
             'table' => $tableA['nombre'],
              'idTable' => $tableA['idCuenta'],
            'employee' => $employee['nombre'] . ' ' . $employee['apellidos']
           
        ]);

        return $pdf->stream('Ticket-Pedido');
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;


class TicketController extends Controller
{
    public function index()
    {
        
        return view('ticket');
    }


    //funcion que genera el ticket por pedido
        public function generateTicket()
    {
        //recuperar datos 
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $employees = $response->json('data');

        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $tables = $response->json('data');

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');
    
        $url = config('app.api') . '/order';
        $response = Http::withToken($user['token'])->get($url);
        $orden = $response->json('data');
        //dd($orden);
        $id=153;
        $url = config('app.api') . '/order/product/pedido/'.$id;
        $response = Http::withToken($user['token'])->get($url);
        $rutaP = $response->json('data');
    //     //dd($rutaP);
    //    $pedidoAux = $rutaP['0'];
       
    //    $id2=$pedidoAux["id_Pedido"];
    // //    dd($id2);

    //    //obteemos el pedido
    //    $url = config('app.api') . '/order/'.$id2;
    //     $response = Http::withToken($user['token'])->get($url);
    //     $response = $response->json('data');
    //     $pedidoFecha = $response['fechaYhora'];
    //     dd($pedidoFecha);


        //dd($rutaP);
        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar la vista del ticket con los datos
        $html = view('ticketPedido',compact('rutaP','employees','id','products','orden','tables'))->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Establecer tamaño y orientación del papel
        $dompdf->setPaper([0, 0, 56.693, 90.718], 'portrait'); // Tamaño en milímetros (50mm x 80mm)

        // Renderizar el PDF
        $dompdf->render();

        // Mostrar el PDF en el navegador
        $dompdf->stream('Ticket_Pedido.pdf', ['Attachment' => false]);
    }

    //funcion que genera el ticket final a traves de datos de cuenta
    public function generateTicketFinal()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        
        $user = session()->get('user');
        
        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $employees = $response->json('data');

        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $tables = $response->json('data');

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');

        $url = config('app.api') . '/order';
        $response = Http::withToken($user['token'])->get($url);
        $orden = $response->json('data');
        
        $url = config('app.api') . '/cuenta';
        $response = Http::withToken($user['token'])->get($url);
        $cuenta = $response->json('data');
       
        $url = config('app.api') . '/cuenta/items/104';
        $response = Http::withToken($user['token'])->get($url);
        $response = $response->json();
       
        $cuentafinal = $response['data'];
        $message = $response['mensage'];
        
        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar la vista del ticket con los datos
        $html = view('pdfD',compact('cuentafinal','message','cuenta','employees','products','orden','tables'))->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Establecer tamaño y orientación del papel
        $dompdf->setPaper([0, 0, 56.693, 90.718], 'portrait'); // Tamaño en milímetros (50mm x 80mm)

        // Renderizar el PDF
        $dompdf->render();

        // Mostrar el PDF en el navegador
        $dompdf->stream('Ticket_Final.pdf', ['Attachment' => false]);
    }

    //ejemplo para proceso de venta
    public function ticketPedido($table)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/table/' . $table;
        $response = Http::withToken($user['token'])->get($url);
        $table = $response->json('data');

        $url = config('app.api') . '/employee/search-id/' . $table['idEmpleado'];
        $response = Http::withToken($user['token'])->get($url);
        $employee = $response->json('data');

        $pdf = PDF::setPaper('8.5x11')->loadView('pdf.ticket', [
            'table' => $table['nombre'],
            'employee' => $employee['nombre'] . ' ' . $employee['apellidos']
        ]);

        return $pdf->stream('Ticket-Pedido');
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use  Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;


class TicketController extends Controller
{
    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        
        return view('ticket');
    }
    //funcion para visualizar el html para facil manejo 
    //funcon que genera el ticket por pedido
    public function verTicket()
    {
        //recuperar datos 
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $employees = $response->json('data');
        
        //dd($employees);
        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $tables = $response->json('data');
        //dd($tables);

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');
        //dd($products);
    
        $url = config('app.api') . '/order';
        $response = Http::withToken($user['token'])->get($url);
        $orden = $response->json('data');
        //dd(orden);
        $url = config('app.api') . '/order/product/pedido/1';
        $response = Http::withToken($user['token'])->get($url);
        $rutaP = $response->json('data');
        //dd($rutaP);

        return view('ticketPedido',compact('rutaP','employees','products','orden','tables'))->render();
    }
    //funcon que genera el ticket por pedido
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
        
        //dd($employees);
        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $tables = $response->json('data');
        //dd($tables);

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');
        //dd($products);
    
        $url = config('app.api') . '/order';
        $response = Http::withToken($user['token'])->get($url);
        $orden = $response->json('data');
        //dd(orden);
        $url = config('app.api') . '/order/product/pedido/1';
        $response = Http::withToken($user['token'])->get($url);
        $rutaP = $response->json('data');
        //dd($rutaP);

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar la vista del ticket con los datos
        $html = view('ticketPedido',compact('rutaP','employees','products','orden','tables'))->render();

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
    //recuperar datos 
    if (!session()->get('user')) {
        return redirect()->route('auth.login');
    }

    $user = session()->get('user');

    
    $url = config('app.api') . '/employee';
    $response = Http::withToken($user['token'])->get($url);
    $employees = $response->json('data');
    
    //dd($employees);
    $url = config('app.api') . '/table';
    $response = Http::withToken($user['token'])->get($url);
    $tables = $response->json('data');
    //dd($tables);
    $url = config('app.api') . '/product';
    $response = Http::withToken($user['token'])->get($url);
    $products = $response->json('data');
    //dd($products);

    $url = config('app.api') . '/order';
    $response = Http::withToken($user['token'])->get($url);
    $orden = $response->json('data');
    //dd(orden);
    $url = config('app.api') . '/cuenta';
    $response = Http::withToken($user['token'])->get($url);
    $cuenta = $response->json('data');
    //dd($cuenta);
    $url = config('app.api') . '/cuenta/items/1';
    $response = Http::withToken($user['token'])->get($url);
    $cuentafinal = $response->json('data');
    //dd($cuenta1);
    // Crear una instancia de Dompdf
    $dompdf = new Dompdf();

    // Cargar la vista del ticket con los datos
    $html = view('pdfD',compact('cuentafinal','cuenta','employees','products','orden','tables'))->render();

    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Establecer tamaño y orientación del papel
    $dompdf->setPaper([0, 0, 56.693, 90.718], 'portrait'); // Tamaño en milímetros (50mm x 80mm)

    // Renderizar el PDF
    $dompdf->render();

    // Mostrar el PDF en el navegador
    $dompdf->stream('Ticket_Final.pdf', ['Attachment' => false]);
}

    public function pdf(){
       
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/rol';
        $response = Http::withToken($user['token'])->get($url);
        $roles = $response->json('data');

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $employees = $response->json('data');
        
        $datos=['employees'=>$employees];
        
        $pdf = PDF::loadView('pdf',$datos);
         # Encabezado y datos de la empresa #
   
        
        return $pdf->stream();
        
    }
}

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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        //dd($employees);
        $url = config('app.api') . '/category';
        $response = Http::withToken($user['token'])->get($url);
        $categories = $response->collect('data');

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');
        //dd($products);
        $url = config('app.api') . '/order';
        $response = Http::withToken($user['token'])->get($url);
        $orden = $response->json('data');
        //dd($orden);

        $url = config('app.api') . '/order/product';
        $response = Http::withToken($user['token'])->get($url);
        $pedido = $response->json('data');
        //dd($pedido);

         $url = config('app.api') . '/order/1';
        $response = Http::withToken($user['token'])->get($url);
         $cosas = $response->json('data');
        // dd($cosas);
        
        return view('ticket', compact('roles','employees','categories','products','orden','pedido'));
       // return view('prueba', compact('roles','employees','categories','products','orden','pedido'));
    
    }
    public function generateTicket()
{
    //recuperar datos 
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
    //dd($employees);
    $url = config('app.api') . '/category';
    $response = Http::withToken($user['token'])->get($url);
    $categories = $response->collect('data');

    $url = config('app.api') . '/product';
    $response = Http::withToken($user['token'])->get($url);
    $products = $response->json('data');
    //dd($products);
    $url = config('app.api') . '/order';
    $response = Http::withToken($user['token'])->get($url);
    $orden = $response->json('data');
    //dd($orden);

    $url = config('app.api') . '/order/product';
    $response = Http::withToken($user['token'])->get($url);
    $pedido = $response->json('data');
    //dd($pedido);

     $url = config('app.api') . '/order/1';
    $response = Http::withToken($user['token'])->get($url);
     $cosas = $response->json('data');
    
    //return view('ticket', compact('roles','employees','categories','products','orden','pedido','cosas'));
    // Crear una instancia de Dompdf
    $dompdf = new Dompdf();

    // Obtener los datos necesarios para el ticket desde tu lógica o modelo

    // Cargar la vista del ticket con los datos
    $html = view('pdfD',compact('roles','employees','categories','products','orden','pedido','cosas'))->render();

    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Establecer tamaño y orientación del papel
    $dompdf->setPaper([0, 0, 56.693, 90.718], 'portrait'); // Tamaño en milímetros (50mm x 80mm)

    // Renderizar el PDF
    $dompdf->render();

    // Mostrar el PDF en el navegador
    $dompdf->stream('Ticket_Nro_1.pdf', ['Attachment' => false]);
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
        
        $pdf = PDF::setPaper([0,0,80,170])-> loadView('pdf',$datos);
         # Encabezado y datos de la empresa #
   
        
        return $pdf->stream();
        
    }
}

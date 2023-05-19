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

        //return view('admin.employees.index', compact('roles', 'employees'));
        
        return view('ticket');
    }
    public function generateTicket()
    {
        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Obtener los datos necesarios para el ticket desde tu lógica o modelo

        // Cargar la vista del ticket con los datos
        $html = view('pdfD')->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Establecer tamaño y orientación del papel
        $dompdf->setPaper('A4', 'portrait');

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
        
        $pdf = PDF::loadView('pdf',$datos);
         # Encabezado y datos de la empresa #
   
        
        return $pdf->stream();
        
    }
}

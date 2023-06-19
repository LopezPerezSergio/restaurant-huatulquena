<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Dompdf\Dompdf;

class ReporteController extends Controller
{
    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $url = config('app.api') . '/paymets/';
        $response = Http::withToken($user['token'])->get($url);
        $payments = $response->json('data');

        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->get($url);
        $ventas = $response->json('data');
       
        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $mesas = $response->json('data');

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $empleados = $response->json('data');

        return view('admin.sales.index', compact('ventas', 'mesas', 'empleados','payments'));
    }
    //funcion que genera el pdf para el reporte de ventas 
    public function generarReporte(Request $request)
    {
    
         //obtener la fecha seleccionada
         $fechaSeleccionada = $request->input('fecha');
         // Obtener los datos de las cuentas desde la API
         if (!session()->get('user')) {
             return redirect()->route('auth.login');
         }
     
         $user = session()->get('user');
     
         $url = config('app.api') . '/venta/';
         $response = Http::withToken($user['token'])->get($url);
         $data = $response->json('data');
         $orders = collect($data);
         //dd($orders);
         $filteredVentas = $orders->where('fecha', $fechaSeleccionada);
        // Crear el HTML del reporte uan tabla sencilla 
        $html = view('pdf.reportePdf', compact('filteredVentas','fechaSeleccionada'))->render();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();
    
        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
    
        // Opcional: Personalizar opciones de configuración de Dompdf
        $dompdf->setPaper('A4', 'portrait');
    
        // Renderizar el HTML en PDF
        $dompdf->render();
    
        // Descargar el PDF generado
        return $dompdf->stream('reporte_cuentas.pdf', ['Attachment' => false]);
 
    }
    //funcion que genera el pdf del corte de caja
    public function generarPdf(Request $request)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        $user = session()->get('user');

        $url = config('app.api') . '/paymets/';
        $response = Http::withToken($user['token'])->get($url);
        $payments = $response->json('data');

        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->get($url);
        $ventas = $response->json('data');

        $html = view('pdf.corteCaja', compact('payments','ventas'))->render();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();
    
        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
    
        // Opcional: Personalizar opciones de configuración de Dompdf
        $dompdf->setPaper('A4', 'portrait');
    
        // Renderizar el HTML en PDF
        $dompdf->render();
    
        // Descargar el PDF generado
        return $dompdf->stream('reporteCaja.pdf', ['Attachment' => false]);
    }

}

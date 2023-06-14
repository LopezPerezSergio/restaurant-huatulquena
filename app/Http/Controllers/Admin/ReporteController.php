<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Dompdf\Dompdf;

class ReporteController extends Controller
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


        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->get($url);
        $ventas = $response->json('data');
       
        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $mesas = $response->json('data');

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $empleados = $response->json('data');

        


        return view('admin.sales.index', compact('ventas', 'mesas', 'empleados'));
    }
    //la funcion reportehtml es para visualizar facilmente y darle estilo al reporte
    public function reportehtml(Request $request)
    {
         //obtener lla fecha seleccionada
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

    return view('reportePdf', compact('filteredVentas', 'fechaSeleccionada'))->render();

    }
    //la funcionn que convoerte el html a un formato de pdf
    public function generarReporte(Request $request)
{
    
         //obtener lla fecha seleccionada
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
     $html = view('reportePdf', compact('filteredVentas','fechaSeleccionada'))->render();

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
}

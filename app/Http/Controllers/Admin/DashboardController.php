<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class DashboardController extends Controller
{
    
    public function __invoke()
    {
        $fecha = Carbon::now();
        $isTenPM = $fecha->isSameHour('22:00:00');

        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        $user = session()->get('user');

        ////////////////
        $url = config('app.api') . '/product/cont';
        $response = Http::withToken($user['token'])->get($url);
        $products_cont = $response->json('data');

        $productContV = [];
        $productContC = [];

        for ($i = 0; $i < count($products_cont); $i++) {
            if ($products_cont[$i]['tipo'] == 'vendidos') {
                $productContV[] = $products_cont[$i];
            } elseif ($products_cont[$i]['tipo'] == 'cancelados') {
                $productContC[] = $products_cont[$i];
            }
        }
        
        //////////////////

        //DATOS PARA GRAFICAS DE PRODUCTOS
        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');

        

        //GUARDAR LOS DATOS AL FIN DE MES EN LA NUEVA ENTIDAD
        // if ($fecha->isLastOfMonth() && $isTenPM) {
        //     // dd( "Es el último día del mes a las 10pm");
        //     //AQUI IRA LA RUTA PARA GUARDAR 
        //     for ($i = 0; $i < 5; $i++) {

        //         $url = config('app.api') . '/product/cont';
        //         $response = Http::withToken($user['token'])->post($url, [
        //             'nombre' =>  $productsNameCancelados2[$i],
        //             'tipo' =>  'cancelados',
        //             'cantidad' =>  $productsCancelados2[$i],
        //             'fecha' =>  $fecha,
        //         ]);
        //     }

        //     for ($i = 0; $i < 5; $i++) {
        //         $url = config('app.api') . '/product/cont';
        //         $response = Http::withToken($user['token'])->post($url, [
        //             'nombre' =>  $productsNameVendidos2[$i],
        //             'tipo' =>  'vendidos',
        //             'cantidad' =>  $productsVendidos2[$i],
        //             'fecha' =>  $fecha,
        //         ]);
        //     }
        // } else {
        //     //  dd( "No es el último día del mes a las 10pm");
        // }

        //DATOS PARA GRAFICAS DE VENTAS
        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->get($url);
        $sales = $response->json('data');

        $meses_sales = [];
        $totalventa = []; //total de ventas por dia
        $totalventaMeses = [];
        $anio_sales = []; //total de ventas por año

        $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio',  'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

        $year_present = Carbon::now()->year;
        $totalpromedio = 0;
        for ($i = 0; $i < count($sales); $i++) {
            $totalventa[] = $sales[$i]['total'];

            //pasamos la fecha a solo año 
            $aux = Carbon::parse($sales[$i]['fecha']);
            $anio_sales[] = $aux->year;

            if ($aux->year === $year_present) {

                //pasamos la fecha a solo meses 
                $aux = Carbon::parse($sales[$i]['fecha']);

                //asignamos el formato y pasamos a español
                $aux->format('F');
                $meses_sales[] = $aux->formatLocalized('%B');

                $totalventaMeses[] = $sales[$i]['total'];
            }
        }

        //ventas por mes
        $ventasMes = [];
        $a = 0;
        for ($i = 0; $i < count($meses); $i++) {
            $a = 0;
            for ($j = 0; $j < count($meses_sales); $j++) {
                if ($meses_sales[$j] == $meses[$i]) {
                    $a += $totalventaMeses[$j];
                }
            }
            $ventasMes[$i] = $a;
        }

        //ventas por año
        $anios = array_values(array_unique($anio_sales));
        sort($anios);

        $ventasAnio = [];
        $promedio = 0;
        $a = 0;
        for ($i = 0; $i < count($anios); $i++) {
            $a = 0;
            for ($j = 0; $j < count($anio_sales); $j++) {
                if ($anio_sales[$j] == $anios[$i]) {
                    $a += $totalventa[$j];
                }
            }
            $ventasAnio[$i] = $a;
            $promedio += $a;
        }
        $promedio = $promedio / count($anios); //promedio de ventas realizadas en los años registrados
        $promedioA = [];
        for ($i = 0; $i < count($anios); $i++) {
            $promedioA[$i] = $promedio;
        }


        //                  DATOS
        //  VENTAS POR MES (meses,ventasMes)
        //  VENTAS POR AÑOS (anios,ventasAnio)
        //  PRODUCTOS MAS VENDIDOS(productsNameVendidos2, productsVendidos2)
        //  PRODUCTOS MAS CANCELADOS(productsNameCancelados2, productsCancelados2)

        // dd($productContC);

        return view('admin.dashboard', compact(
            'products',
            'meses',
            'ventasMes',
            'anios',
            'ventasAnio',
            'promedioA',
            
            'productContV',
            'productContC',

        ));
    }
}

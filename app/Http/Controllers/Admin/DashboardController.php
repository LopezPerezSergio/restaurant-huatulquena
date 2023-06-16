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
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        $user = session()->get('user');

        //DATOS PARA GRAFICAS DE PRODUCTOS
        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');

        $productsName = [];

        $productsNameVendidos = [];
        $productsVendidos = [];

        $productsNameMenosVendidos = [];
        $productsMenosVendidos = [];

        $productsNameCancelados = [];
        $productsCancelados = [];

        for ($i = 0; $i < count($products); $i++) { ///agregamos a los arreglos los datos que ocuparemos
            $productsName[] = $products[$i]['nombre'];
            $productsVendidos[] = $products[$i]['contador'];
            $productsCancelados[] = $products[$i]['cancelados'];
        }
        

        $productsNameVendidos = $productsName;
        $n = count($productsVendidos);
        for ($i = 0; $i < $n - 1; $i++) { //ordenamiento burbuja de productos mas vendidos de mayor a menor
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($productsVendidos[$j] < $productsVendidos[$j + 1]) { //productos mas vendidos
                    // Intercambiar elementos si están en orden incorrecto
                    $temp = $productsVendidos[$j];
                    $temp2 = $productsNameVendidos[$j];

                    $productsVendidos[$j] = $productsVendidos[$j + 1];
                    $productsNameVendidos[$j] = $productsNameVendidos[$j + 1];

                    $productsVendidos[$j + 1] = $temp;
                    $productsNameVendidos[$j + 1] = $temp2;
                }
            }
        }        
        $productsVendidos2 = [];
        $productsnameVendidos2 = [];
        for ($i = 0; $i < 5; $i++) {  //extraemos solo los 10 mas vendidos
            $productsVendidos2[] = $productsVendidos[$i];
            $productsNameVendidos2[] = $productsNameVendidos[$i];
        }

        /////////////////////////////////////////////

        $productsNameCancelados = $productsName;
        $n = count($productsCancelados);
        for ($i = 0; $i < $n - 1; $i++) { //ordenamiento burbuja de productos mas cancelados de mayor a menor
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($productsCancelados[$j] < $productsCancelados[$j + 1]) { //productos mas cancelados
                    // Intercambiar elementos si están en orden incorrecto
                    $temp = $productsCancelados[$j];
                    $temp2 = $productsNameCancelados[$j];

                    $productsCancelados[$j] = $productsCancelados[$j + 1];
                    $productsNameCancelados[$j] = $productsNameCancelados[$j + 1];

                    $productsCancelados[$j + 1] = $temp;
                    $productsNameCancelados[$j + 1] = $temp2;
                }
            }
        }

        $productsCancelados2 = [];
        $productsnameCancelados2 = [];
        for ($i = 0; $i < 5; $i++) {  //extraemos solo los 10 mas vendidos
            $productsCancelados2[] = $productsCancelados[$i];
            $productsNameCancelados2[] = $productsNameCancelados[$i];
        }

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

        return view('admin.dashboard', compact('meses', 'ventasMes', 'anios', 'ventasAnio', 'promedioA', 'productsNameVendidos2',
         'productsVendidos2', 'productsNameCancelados2', 'productsCancelados2'));
    }
}

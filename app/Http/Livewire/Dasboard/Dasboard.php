<?php

namespace App\Http\Livewire\Dasboard;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dasboard extends Component
{

    public $products;

    public $selectMesVendidos = '';
    public $selectMesCancelados = '';

    public $fecha;

    //variables con datos del mes actual 
    public $productsVendidos2 = [];
    public $productsNameVendidos2 = [];

    public $productsCancelados2 = [];
    public $productsNameCancelados2 = [];

    //variables con datos de meses anteriores
    public $productContV; 
    public $productContC;


    public function mount()
    {
        $this->fecha = Carbon::now();
    }

    public function render()
    {
        return view('livewire.dasboard.dasboard');
    }


    public function actualizarVariable()
    {        
        $this->reset(['productsVendidos2', 'productsNameVendidos2']);

        if ($this->selectMesVendidos == $this->fecha->month) {

            $this->calculosMesActual();
            $this->emit('variableActualizada', $this->productsVendidos2, $this->productsNameVendidos2);

        }else{

            $this->calculosMesAnt($this->selectMesVendidos);
            $this->emit('variableActualizada', $this->productsVendidos2, $this->productsNameVendidos2);

        }
    }

    public function actualizarVariable2()
    {
    //    dd($this->productsCancelados2);
        $this->reset(['productsCancelados2', 'productsNameCancelados2']);

        if ($this->selectMesCancelados == $this->fecha->month) {

            $this->calculosMesActualC();
            $this->emit('variableActualizada2', $this->productsCancelados2, $this->productsNameCancelados2);

        }else{

            $this->calculosMesAntC($this->selectMesCancelados);
            $this->emit('variableActualizada2', $this->productsCancelados2, $this->productsNameCancelados2);
        }
    }

    //PARA PRODUCTOS MAS VENDIDOS
    public function calculosMesActual()
    {     
        $productsName = [];

        $productsNameVendidos = [];
        $productsVendidos = [];

        for ($i = 0; $i < count($this->products); $i++) { ///agregamos a los arreglos los datos que ocuparemos
            $productsName[] = $this->products[$i]['nombre'];
            $productsVendidos[] = $this->products[$i]['contador'];
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

        for ($i = 0; $i < 5; $i++) {  //extraemos solo los 5 mas vendidos
            $this->productsVendidos2[] = $productsVendidos[$i];
            $this->productsNameVendidos2[] = $productsNameVendidos[$i];
        }

    }

    public function calculosMesAnt($mes)
    {
        //calculos sobre la entidad que contiene los datos de los contadores 
        $this->reset(['productsVendidos2', 'productsNameVendidos2']);
        
        for ($i = 0; $i < count($this->productContV); $i++) {
            $aux = Carbon::parse($this->productContV[$i]['fecha']);
            if ($mes == $aux->month) {
                $this->productsVendidos2[] = $this->productContV[$i]['cantidad'];
                $this->productsNameVendidos2[] = $this->productContV[$i]['nombre'];
            }
        }
    }

    ///PARA PRODUCTOS CANCELADOS
    public function calculosMesActualC(){
        $productsName = [];

        $productsNameCancelados = [];
        $productsCancelados = [];

        for ($i = 0; $i < count($this->products); $i++) { ///agregamos a los arreglos los datos que ocuparemos
            $productsName[] = $this->products[$i]['nombre'];
            $productsCancelados[] = $this->products[$i]['cancelados'];
        }

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

        for ($i = 0; $i < 5; $i++) {  //extraemos solo los 5 mas cancelados
             $this->productsCancelados2[] = $productsCancelados[$i];
             $this->productsNameCancelados2[] = $productsNameCancelados[$i];
        }
    }
    public function calculosMesAntC($mes)
    {
        $this->reset(['productsVendidos2', 'productsNameVendidos2']);
        // if (!session()->get('user')) {
        //     return redirect()->route('auth.login');
        // }
        // $user = session()->get('user');

        // ////////////////
        // $url = config('app.api') . '/product/cont';
        // $response = Http::withToken($user['token'])->get($url);
        // $products_cont = $response->json('data');

       

        // for ($i = 0; $i < count($products_cont); $i++) {
        //     if ($products_cont[$i]['tipo'] == 'cancelados') {
        //         $this->productContC[] = $products_cont[$i];
        //     }
        // }

        for ($i = 0; $i < count($this->productContC); $i++) {
            $aux = Carbon::parse($this->productContC[$i]['fecha']);
            if ($mes == $aux->month) {
                $this->productsCancelados2[] = $this->productContC[$i]['cantidad'];
                $this->productsNameCancelados2[] = $this->productContC[$i]['nombre'];
            }
        }
    }
}

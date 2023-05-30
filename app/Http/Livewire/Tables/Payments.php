<?php

namespace App\Http\Livewire\Tables;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use Livewire\Component;

class Payments extends Component
{

    /* variables con el contenido de la informacion */
    public $payments;
    public $employees;
    public $ventas;

    public $filter;

    //Variables para filtro
    public $filterPago;

    public $search = ''; //busqueda por fecha 

    // Varibale que guarda la seleccion del empleado en la vista
    public $employeeSelect;
    public $fechaSelect;

    // Variables con los datos del empleado
    public $sueldo = '';
    public $comision = '';
    public $totalPago = '';

    public $total = 0;
    public $currentDate;


    public function mount(){
        $this->filterPago = '';
        $this->total = 0;
        $this -> currentDate = Carbon::now()->toDateString();
    }

    public function render()
    {
        return view('livewire.tables.payments');
    }

    public function updatedSearch($value)
    {        
        $this -> reset('total');
        if ($value) {           
            $this->filterPago = array_filter($this->payments, function ($payments) use ($value) {
                return str_contains(strtolower($payments['fecha'] ), strtolower($value));               
            });

            foreach ($this->filterPago as $pago) {
                $this->total += $pago['pago'] ;
            }
            
        } else {
            $this->filterPago = '';
            $this->total=0  ;
        }
    }

    //     dump($this-> total);
 
    public function captura(){
        $this->currentDate = Carbon::now()->toDateString(); //obtengo la fecha del dia actual la cual ocupara para buscar las ventas con base a esa fecha
        $this->reset('totalPago');

        $totalAux = 0;

        if ($this->employeeSelect == '0') {   //si la seleccion del empleado es 0 se restablecen las variables
            $this->reset('sueldo','comision', 'totalPago');
        }

        foreach ($this->employees as $employee) { 

            if($employee['nombre'] == $this->employeeSelect){
                
                $this->sueldo = $employee['sueldo'];
                $this->comision = $employee['porcentaje'] / 100;

                if($this->sueldo != '0'){

                    $this->totalPago =  $this->sueldo;

                }elseif($this->comision != '0' ){

                    foreach ($this->ventas as $venta ) {

                        if ($venta['fecha'] == $this->currentDate) {
                            $totalAux = $totalAux + $venta['total'] ;
                        }
                    }
                    $this->totalPago = $totalAux * $this->comision;

                }
            }
        } 
        
    }  

    public function clear()
    {
        $this->reset('sueldo','comision', 'totalPago', 'search');
        $this->filterPago = '';
    }
}
<?php

namespace App\Http\Livewire\Tables;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class Payments extends Component
{

    /* variables con el contenido de la informacion */
    public $payments;
    public $employees;

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

    public $total=0;
    // public $totalPagoTabla ='' ;


    public function mount(){
        $this->filterPago = '';
        $this->total=0;
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
        if ($this->employeeSelect == '0') {
            $this->reset('sueldo','comision', 'totalPago');
        }

        foreach ($this->employees as $employee) {

            if($employee['id'] == $this->employeeSelect){
                
                $this->sueldo = $employee['sueldo'];
                $this->comision = $employee['porcentaje'];

                if($this->sueldo != '0'){

                    $this->totalPago =  $this->sueldo;

                }else{

                    $this->reset('totalPago');

                }
                //  dump($this->e['nombre']);
            }
        } 
        
    }

    public function clear()
    {
        $this->reset('sueldo','comision', 'totalPago', 'search');
        $this->filterPago = '';
    }
}
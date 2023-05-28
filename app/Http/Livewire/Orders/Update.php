<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;

class Update extends Component
{
    /* Variable encargada de mostrar la vista correspondiente de acuerdo a la fase en la que se encuentra */
    public $step = 2; // cambiar los valores entre 0 y 3 de forma manual

    /* ----------------------- Fase 1 -----------------------*/
    public $employee_id = ''; // Guarda el id del empleado seleccionado
    public $codigo_acceso = ''; // Guarda el codigo de Acceso

    /* 
        $id_cuenta
    */
    public function render()
    {
        return view('livewire.orders.update');
    }
}

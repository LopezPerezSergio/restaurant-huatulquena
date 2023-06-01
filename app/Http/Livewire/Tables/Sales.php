<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class Sales extends Component
{
    /* variables con el contenido de la informacion */
    public $ventas;


    public $filter;

    public function render()
    {
        return view('livewire.tables.sales');
    }
}

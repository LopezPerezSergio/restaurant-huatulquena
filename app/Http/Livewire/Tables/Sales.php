<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class Sales extends Component
{
    /* variables con el contenido de la informacion */
    public $ventas;
    public $empleados;
    public $mesas;



    /* Variable que contendra la lista de ventas para el filtrado */
    public $filterSales;

     /* Variables para los filtros  status, nombre, tamaño*/
    //  public $search = ''; //nombre
     public $filter_mesa = '';
     public $filter_mesero = '';

    public function render()
    {
        return view('livewire.tables.sales');
    }

    public function mount()
    {
        $this->filterSales = $this->ventas;
    }

    public function updatedFilterMesa($value)
    {
        if ($value) {
            $this->filterSales = array_filter($this->ventas, function ($venta) use ($value){
                return $venta['nombreMesa']== $value;
            });
        }else {
            $this->filterSales = $this-> ventas;
        }
        $this->reset('filter_mesa');
    }

    public function updatedFilterMesero($value)
    {
        if ($value) {
            $this->filterSales = array_filter($this->ventas, function ($venta) use ($value){
                return $venta['nombreMesero']== $value;
            });
        }else {
            $this->filterSales = $this-> ventas;
        }
        $this->reset('filter_mesero');
    }

    public function clear()
    {
       $this->reset(['filter_mesa', 'filter_mesero']);
       $this->filterSales = $this->ventas;
    }
}
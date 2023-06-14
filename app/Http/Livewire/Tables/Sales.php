<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $ventasCollection = collect($this->ventas);
        //dd($ventasCollection);
        // Configurar la paginación
        $currentPage = Paginator::resolveCurrentPage('page');
        //dd($currentPage);
        $perPage = 5; // Cantidad de elementos por página
        $ventasPaginadas = new LengthAwarePaginator(
            $ventasCollection->forPage($currentPage, $perPage),
            $ventasCollection->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );
        
        return view('livewire.tables.sales',['ventasP' => $ventasPaginadas]);
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
<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Sales extends Component
{
    use WithPagination;
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
        // Apply filters to the $ventas array
        $filteredSales = $this->filterSales();

        // Paginate the filtered results
        $perPage = 2;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($filteredSales, ($currentPage - 1) * $perPage, $perPage);
        $sales = new LengthAwarePaginator($currentItems, count($filteredSales), $perPage, $currentPage);

        return view('livewire.tables.sales', compact('sales'));
     }
     public function filterSales()
     {
         $sales = $this->ventas;
 
         if ($this->filter_mesa) {
             $sales = array_filter($sales, function ($venta) {
                 return $venta['nombreMesa'] == $this->filter_mesa;
             });
         }
 
         if ($this->filter_mesero) {
             $sales = array_filter($sales, function ($venta) {
                 return $venta['nombreMesero'] == $this->filter_mesero;
             });
         }
 
         return $sales;
     }
 
     public function updatedFilterMesa($value)
     {
         $this->filterSales = $this->filterSales();
     }
 
     public function updatedFilterMesero($value)
     {
         $this->filterSales = $this->filterSales();
     }
 
     public function clear()
     {
         $this->reset(['filter_mesa', 'filter_mesero']);
         $this->filterSales = $this->ventas;
     }
}
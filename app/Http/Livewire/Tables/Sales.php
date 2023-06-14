<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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
        //  // Crear una colección de los resultados
        //  $ventasColeccion = collect($this->ventas);
        //  $paginaActual = request()->query('page', 1);
        //  $elementosPorPagina = 1;
     
        //  // Crear una instancia del paginador
        //  $paginador = new Paginator($ventasColeccion->forPage($paginaActual, $elementosPorPagina), $elementosPorPagina, $paginaActual);
        //  $ventasPaginadas = $paginador->withPath('livewire.tables.sales');
        // // $enlacesPaginacion = $ventasP->links();
        //  // Obtener los enlaces de paginación
        //  $enlacesPaginacion = $paginador->links();
        
         // Pasar los resultados paginados, los enlaces de paginación y la página actual a la vista
        //  return view('livewire.tables.sales', [
        //      'ventasP' => $ventasPaginadas,
        //      'enlacesPaginacion' => $enlacesPaginacion,
        //      'paginaActual' => $paginaActual,
        //  ]);
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
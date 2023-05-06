<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class Products extends Component
{
    /* variables con el contenido de la informacion */
    public $products;
    public $categories;

    public $filter;

     /* Variable que contendra la lista de productos para el filtrado */
    public $filterProducts;

     /* Variables para los filtros  status, nombre, tamaño*/
     public $search = ''; //nombre
     public $filter_category = '';
     public $filter_status = '';


     public function mount()
     {
         $this->filterProducts = $this->products;
     }

    public function render()
    {
        return view('livewire.tables.products');
    }

    public function updatedSearch($value)
    {
        if ($value) {
            $this->filterProducts = array_filter($this->products, function ($products) use ($value) {
                return str_contains(strtolower($products['nombre'] ), strtolower($value));
            });
        } else {
            $this->filterProducts = $this->products;
        }
    }

    public function updatedFilterCategory($value)
    {
        if ($value) {
            $this->filterProducts = array_filter($this->products, function ($product) use ($value) {
                return str_contains(strtolower($product['categoriaName']), strtolower($value));
            });
        } else {
            $this->filterProducts = $this->products;
        }
        $this->reset('filter_status');
    }

    public function updatedFilterStatus($value)
    {
        if ($value == '0' || $value == '1') {
            $this->filterProducts = array_filter($this->products, function ($product) use ($value) {
                return $product['status'] == $value;
            });
        } else {
            $this->filterProducts = $this->products;
        }
        $this->reset('filter_category');
    }

    public function clear()
    {
        $this->reset(['filter_category', 'filter_status', 'search']);
        $this->filterProducts = $this->products;
    }
}

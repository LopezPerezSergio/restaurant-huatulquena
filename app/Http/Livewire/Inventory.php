<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inventory extends Component
{
    public $inventory;
    public $productos;
    public $search = '';
     /* Variable que contendra la lista de productos en inventario para el filtrado */
     public $filterProducts;

     /* Variables para los filtros  status, nombre, tamaño*/
     
     public $filter_category = '';
     public $filter_status = '';

    public function render()
    {
        // dd($this->productos);
        // dd($this->inventory);
        return view('livewire.inventory');
    }   

     public function mount()
     {
         $this->filterProducts = $this->inventory;
     }

    public function updatedSearch($value)
    {
        if ($value) {
            $this->filterProducts = array_filter($this->inventory, function ($inventory) use ($value) {
                return str_contains(strtolower($inventory['nombre'] ), strtolower($value));
            });
        } else {
            $this->filterProducts = $this->inventory;
        }
    }

    public function updatedFilterCategory($value)
    {
        if ($value) {
            $this->filterProducts = array_filter($this->inventory, function ($product) use ($value) {
                return str_contains(strtolower($product['categoria']), strtolower($value));
            });
        } else {
            $this->filterProducts = $this->inventory;
        }
        $this->reset('filter_status');
    }

    public function updatedFilterStatus($value)
    {
        if ($value == '0' || $value == '1') {
            $this->filterProducts = array_filter($this->inventory, function ($product) use ($value) {
                return $product['status'] == $value;
            });
        } else {
            $this->filterProducts = $this->inventory;
        }
        $this->reset('filter_category');
    }

    public function clear()
    {
        $this->reset(['filter_category', 'filter_status', 'search']);
        $this->filterProducts = $this->inventory;
    }


}

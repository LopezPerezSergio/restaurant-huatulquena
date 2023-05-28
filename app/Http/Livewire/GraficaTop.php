<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GraficaTop extends Component
{
    public $products;
    public function getProductData()
    {
        
        $this->products = collect($this->products);
       
    
    }
    public function render()
    {
        $this->getProductData();
        return view('livewire.grafica-top');
    }
}

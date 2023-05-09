<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Tables\Products;
use Livewire\Component;

class GraficaC extends Component
{
    public $products;
    public function getProductData()
    {
        
        $this->products = collect($this->products);
    $categories=$this->products->pluck('categoriaName');
    $categorieCounts = $categories->countBy();
    $this->products = [
        'labels' => $categorieCounts->keys(),
        'data' => $categorieCounts->values(),
    ];
    
    }
    public function render()
    {
        $this->getProductData();
       
        return view('livewire.grafica-c');
    }
}

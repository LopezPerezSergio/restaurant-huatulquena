<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class Products extends Component
{
    public $products;
    public $categories;
    public $filter;

    public function render()
    {
        return view('livewire.tables.products');
    }
}

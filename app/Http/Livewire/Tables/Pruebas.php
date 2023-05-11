<?php

namespace App\Http\Livewire\Tables;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Pruebas extends Component
{
    /* variables con el contenido de la informacion */
    public $categories; //categorias con los productos
    public $employees; // lista de los usuarios (meseros, admin, cajeros)

    public $step = 2;

    public $table = '';
    public $employee_id = '';
    public $codigo_acceso = '';

    public $stock = 1;
    public $options = [
        'size' => null,
        'category' => null,

    ];

    public function render()
    {
        return view('livewire.tables.pruebas');
    }

    public function updatedTable()
    {
        $this->step ++;
    }

    public function validatedEmployee()
    {
        $this->step ++;
    }

    public function addItem($id, $name, $price, $tamanio, $category)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;

        Cart::add( ['id' => $id,
                    'name' => $name,
                    'qty' => 1,
                    'price' => $price,
                    'options' => $this->options]
                );
    }

    public function removeItem($id, $name, $price, $tamanio, $category)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;

        Cart::add( ['id' => $id,
                    'name' => $name,
                    'qty' => 1,
                    'price' => $price,
                    'options' => $this->options]
                );
    }
}
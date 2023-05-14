<?php

namespace App\Http\Livewire\Tables;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Pruebas extends Component
{
    /* variables con el contenido de la informacion */
    public $categories; //categorias con los productos
    public $employees; // lista de los usuarios (meseros, admin, cajeros)
    public $user; // Usuairio autenticado (tipo de rol Usuario Venta)

    /* Variable encargada de mostrar la vista correspondiente de acuerdo a la fase en la que se encuentra */
    public $step = 0; // cambiar los valores entre 0 y 3 de forma manual

    /* Varibale de interaccion con los datos del componente */
    /* ----------------------- Fase 0 -----------------------*/
    public $table = ''; // Guarda el nombre de la mesa
    /* ----------------------- Fase 1 -----------------------*/
    public $employee_id = ''; // Guarda el id del empleado seleccionado
    public $codigo_acceso = ''; // Guarda el codigo de Acceso

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
        $url = config('app.api') . '/employee/valid/' . $this->employee_id; // localhost:8080/employee/valid/{id}
        $response = Http::withToken($this->user['token'])->post($url, [
            'codigoAcceso' => $this->codigo_acceso,
        ]);

        $response->json('mensage');

        if ($response) {
            $this->step ++;
        }
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

    public function removeItem($product)
    {
        Cart::remove($product);
    }

    public function clear()
    {
        Cart::destroy();
    }
}
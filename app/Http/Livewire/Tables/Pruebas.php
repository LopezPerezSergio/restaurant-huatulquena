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
    public $user; // Usuario autenticado (tipo de rol Usuario Venta)
    //dcalara prpiedad tables

    /* Variable encargada de mostrar la vista correspondiente de acuerdo a la fase en la que se encuentra */
    public $step = 2; // cambiar los valores entre 0 y 3 de forma manual

    /* Varibale de interaccion con los datos del componente */
    /* ----------------------- Fase 0 -----------------------*/
    public $table = ''; // Guarda el nombre de la mesa

    /* ----------------------- Fase 1 -----------------------*/
    public $employee_id = ''; // Guarda el id del empleado seleccionado
    public $codigo_acceso = ''; // Guarda el codigo de Acceso

    /* ----------------------- Fase 2 -----------------------*/

    
    /* ----------------------- Fase 3 -----------------------*/

    public $stock = 1; // Variable para pruebas

    public $options = [
        'size' => null,
        'category' => null,
        'description' => null
    ];

    public function render()
    {
        return view('livewire.tables.pruebas');
    }

    public function updatedTable()
    {
        $this->step ++;
    }

    /* Metodo para validar el codigo del empleado */
    public function validatedEmployee()
    {
        $url = config('app.api') . '/employee/valid/' . $this->employee_id; // localhost:8080/employee/valid/{id}
        $response = Http::withToken($this->user['token'])->post($url, [
            'codigoAcceso' => $this->codigo_acceso,
        ]);

        $response = $response->json('mensage') == 'true' ? true : false ;

        if ($response) {
            $this->step ++;
        }
    }

    /* Metodo para agregar contenido a la orden */
    public function addItem($id, $name, $price, $tamanio, $category)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;
        $this->options['description'] = '';

        Cart::add( ['id' => $id,
                    'name' => $name,
                    'qty' => 1,
                    'price' => $price,
                    'options' => $this->options]
                );
    }

    /* Metodo para agregar contenido a la orden */
    public function updateItem($rowId, $options, $description)
    {
        $options['description'] = $description;

        Cart::update($rowId, ['options' => $options]);
    }

    /* Metodo para eliminar un producto de la lista */
    public function removeItem($product)
    {
        Cart::remove($product);
    }

    /* Metodo para limpiar la lista de productos */
    public function clear()
    {
        Cart::destroy();
    }

    public function destroy()
    {
        $this->clear();
        $this->reset(['step' ,'table', 'employee_id', 'codigo_acceso', 'options']);
    }
}
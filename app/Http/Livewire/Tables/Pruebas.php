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
    public $tables;
    public $products;
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
    /* Toda tarea se lleva a acbo con el Cart */
    public $pro;

    // Variables para el buscador
    public $search = '';
    public $filterProducts;

    /* ----------------------- Fase 3 -----------------------*/

    public $stock = 1; // Variable para pruebas

    public $options = [
        'size' => null,
        'category' => null,
        'description' => null,
        'image' => null
    ];

    public function render()
    {
        return view('livewire.tables.pruebas');
    }

    public function mount()
    {
        $this->filterProducts = $this->products;
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

    public function updatedTable()
    {
        $this->step++;
    }

    /* Metodo para validar el codigo del empleado */
    public function validatedEmployee()
    {
        $url = config('app.api') . '/employee/valid/' . $this->employee_id; // localhost:8080/employee/valid/{id}
        $response = Http::withToken($this->user['token'])->post($url, [
            'codigoAcceso' => $this->codigo_acceso,
        ]);

        $response = $response->json('mensage') == 'true' ? true : false;

        if ($response) {
            $this->step++;
        }
    }

    /* Metodo para agregar contenido a la orden */
    public function addItem($id, $name, $price, $tamanio, $category, $image)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;
        $this->options['description'] = 'Sin descripcion';
        $this->options['image'] = $image;

        Cart::add(
            [
                'id' => $id,
                'name' => $name,
                'qty' => 1,
                'price' => $price,
                'options' => $this->options
            ]
        );
    }

    /* Metodo para eliminar contenido a la orden */
    public function decItem($id, $name, $price, $tamanio, $category, $image)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;
        $this->options['description'] = 'Sin descripcion';
        $this->options['image'] = $image;

        $product = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        })->first();

        if ($product) {
            if ($product->qty == 1) {
                Cart::remove($product->rowId);
            } else {
                Cart::add(
                    [
                        'id' => $id,
                        'name' => $name,
                        'qty' => -1,
                        'price' => $price,
                        'options' => $this->options
                    ]
                );
            }
        }
    }

    /* Metodo para editar contenido a la orden (descripcion) */
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
        $this->reset(['options', 'search']);
        Cart::destroy();
        $this->filterProducts = $this->products;
    }

    /* Metodo para destruir todo el proceso de la orden */
    public function destroy()
    {
        $this->clear();
        $this->reset(['step', 'table', 'employee_id', 'codigo_acceso', 'options', 'search']);
        $this->filterProducts = $this->products;
    }

    /* Metodo que aumentara el Step */
    public function continue()
    {
        $this->step++;
    }

    /* Metodo que decrementara el Step */
    public function revers()
    {
        $this->step--;
    }

    /* Metodo para generar la Orden (Pedido) */
    public function cretedOrder()
    {
        # Codificacion del roden
        $this->reset(['search']);
        $this->filterProducts = $this->products;
    }


}

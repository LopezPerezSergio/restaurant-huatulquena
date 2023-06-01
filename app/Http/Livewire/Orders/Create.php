<?php

namespace App\Http\Livewire\Orders;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Create extends Component
{
    /* Variable encargada de mostrar la vista correspondiente de acuerdo a la fase en la que se encuentra */
    public $step = 1; // cambiar los valores entre 1 y 3 de forma manual

    /* variables con el contenido de la informacion */
    public $employees; // lista de los usuarios (meseros, admin, cajeros)
    public $categories;
    public $products;
    public $table;

    /* ----------------------- Fase 1 -----------------------*/
    public $employee_id = ''; // Guarda el id del empleado seleccionado
    public $codigo_acceso = ''; // Guarda el codigo de Acceso

    /* ----------------------- Fase 2 -----------------------*/
    public $options = [ // opciones para el producto que se agragara
        'size' => null,
        'category' => null,
        'description' => null,
        'image' => null
    ];
    public $description = ''; // Guarda la descripcion que le vamos a pasar al producto

    // Variables para el buscador
    public $search = '';
    public $filterProducts;


    public $stock = 1; //hay que quitarlo despues

    public function mount()
    {
        $this->filterProducts = $this->products;
    }

    public function render()
    {
        return view('livewire.orders.create');
    }

    /* ----------------------- Fase 1 -----------------------*/

    /* Metodo para validar el codigo del empleado */
    public function validatedEmployee()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/employee/valid/' . $this->employee_id; // localhost:8080/employee/valid/{id}
        $response = Http::withToken($user['token'])->post($url, [
            'codigoAcceso' => $this->codigo_acceso,
        ]);

        $response = $response->json('mensage') == 'true' ? true : false;

        if ($response) {
            $this->step++;
        } else {
            session()->flash('alert-order', 'Acceso Denegado, Verifique sus Datos');
        }
    }

    /* ----------------------- Fase 2 -----------------------*/

    /* Metodo para la busqueda de productos */
    public function updatedSearch($value)
    {
        if ($value) {
            $this->filterProducts = array_filter($this->products, function ($products) use ($value) {
                return str_contains(strtolower($products['nombre']), strtolower($value));
            });
        } else {
            $this->filterProducts = $this->products;
        }
    }

    /* Metodo para agregar contenido a la orden */
    public function addItem($id, $name, $price, $tamanio, $category, $image)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;
        $this->options['description'] = '';
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

        $this->reset(['description']);
    }

    /* Metodo para eliminar contenido a la orden */
    public function decItem($id, $name, $price, $tamanio, $category, $image)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;
        $this->options['description'] = '';
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

        $this->reset(['description']);
    }

    /* Metodo para editar contenido a la orden (descripcion) con fallas :c */
    public function updateDescriptionItem($rowId, $tamanio, $category, $image)
    {
        $this->options['size'] = $tamanio;
        $this->options['category'] = $category;
        $this->options['description'] = $this->description;
        $this->options['image'] = $image;

        Cart::update($rowId, ['options' => $this->options]);

        $this->reset(['description']);
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

    /* ----------------------- Fase 2 -----------------------*/

    /* Metodo que decrementara el Step */
    public function revers()
    {
        $this->step--;
    }

    /* ----------------------- Fase 3 -----------------------*/

    /* Metodo para generar la Orden (Pedido) */
    public function cretedOrder()
    {
        /* 
            crear cuenta
            crear pedido
            le meto los productos a pedido (Pedido - producto)
            crear ticket
        */
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        /* Creo la cuenta */
        $url = config('app.api') . '/cuenta'; // localhost:8080/cuenta
        $response = Http::withToken($user['token'])->post($url, []);
        $cuenta = $response->json('data'); // id de cuenta

        if ($cuenta) {
            /* Creo el pedido (order)*/
            $url = config('app.api') . '/order'; // localhost:8080/order
            $response = Http::withToken($user['token'])->post($url, [
                'idMesa' => $this->table['id'],
                'idCuenta' => $cuenta,
            ]);
            $pedido = $response->json('data');

            if ($pedido) {
                /* Creo la relacion de los productos con sus pedidos */
                $url = config('app.api') . '/order/product/add'; // localhost:8080/order/product/add
                foreach (Cart::content() as $product) {
                    $response = Http::withToken($user['token'])->post($url, [
                        'cantidad' => $product->qty,
                        'descripcion' => $product->options->description,
                        'idPedido' => $pedido,
                        'idProducto' => $product->id,
                    ]);
                }

                $url = config('app.api') . '/employee/search-id/' . $this->employee_id;
                $response = Http::withToken($user['token'])->get($url);
                $employee = $response->json('data');

                $url = config('app.api') . '/table/' . $this->table['id'];

                $response = Http::withToken($user['token'])->put($url, [
                    'id' => $this->table['id'],
                    'nombre' => $this->table['nombre'],
                    'capacidad' => $this->table['capacidad'],
                    'status' => 2,
                    'empleado' => $employee
                ]);

                $this->step++;
            }
        }
    }

    /* ----------------------- Fase 4 -----------------------*/

    /* Metodo para crear el ticket del pedido */
    public function createdTicket()
    {
        $this->clear();
        $this->reset(['step', 'table', 'employee_id', 'codigo_acceso', 'options', 'search']);
        
        redirect()->route('orders.index');
    }
}

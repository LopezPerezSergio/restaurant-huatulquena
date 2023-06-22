<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class AdminMesas extends Component
{

    public $tables;
    public $ordProd;
    public $products;
    public $employees;

    public $id_table = '';
    public $name_table;
    public $cuenta;
    public $total;

    public $showModal = false;
    public $showModalCerrarOrder = false;
    public $showModalDeleteOrder = false;

    public function mount()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        //recupero los pedidos-productos
        $url = config('app.api') . '/order/product';
        $response = Http::withToken($user['token'])->get($url);
        $this->ordProd = $response->json('data');
    }

    public function render()
    {
        $this->getTotal();
        return view('livewire.orders.admin-mesas');
    }

    public function deleteOrder($id) //eliminar orden y todos su productos. Agregar los eliminados a cancelados en cada producto
    {
        if ($id) {
            if (!session()->get('user')) {
                return redirect()->route('auth.login');
            }

            $user = session()->get('user');

            foreach ($this->ordProd as $p) {
                if ($p['id_Pedido'] == $id) {

                    $url = config('app.api') . '/product/' . $p['id_Producto'];
                    $response = Http::withToken($user['token'])->get($url);
                    $producto = $response->json('data');

                    $pCantidad =  $p['cantidad'] + $producto['cancelados']; //sumamos el valor que tiene de cancelados con el de cantidad pedida del producto cancelado

                    $url = config('app.api') . '/product/cancel/' . $p['id_Producto'];     ///editamos la cantidad de productos cancelados                
                    $response = Http::withToken($user['token'])->put($url, [
                        'contador' => $pCantidad
                    ]);
                }
            }

            $url = config('app.api') . '/order/' . $id;
            $response = Http::withToken($user['token'])->delete($url);
            $response = $response->json('data');

            // $this->reset(['codigo_acceso']);
            return redirect()->route('orders.index');
        }
    }
    public function deleteProductOrder($id)
    {
        if ($id) {
            if (!session()->get('user')) {
                return redirect()->route('auth.login');
            }
            $user = session()->get('user');

            $url = config('app.api') . '/order/product/' . $id; //me da todo el contendio de pedido producto
            $response = Http::withToken($user['token'])->get($url);
            $producto = $response->json('data');

            foreach ($this->products as $p) {
                if ($p['id'] == $producto['id_Producto']) {

                    $pCantidad =  $producto['cantidad'] + $p['cancelados']; //sumamos el valor que tiene de cancelados con el de cantidad pedida del producto cancelado

                    $url = config('app.api') . '/product/cancel/' . $p['id'];     ///editamos la cantidad de productos cancelados                
                    $response = Http::withToken($user['token'])->put($url, [
                        'contador' => $pCantidad
                    ]);
                }
            }

            $url = config('app.api') . '/order/product/' . $id;

            $response = Http::withToken($user['token'])->delete($url);

            $response = $response->json('data');


            return redirect()->route('orders.index');
        }
    }

    public function openModal($id)
    {
        $this->id_table = $id;
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');


        foreach ($this->tables as $table) {
            if ($table['id'] == $id) {
                $this->name_table = $table['nombre'];
                $url = config('app.api') . '/cuenta/items/' . $table['idCuenta'];

                $response = Http::withToken($user['token'])->get($url);

                $this->cuenta = $response->collect('data');
                $this->cuenta = $this->cuenta->first();
            }
        }
        // dd( $this->name_table);
        // dump($this->cuenta);
        $this->showModal = !$this->showModal;
    }

    public function openModal2()
    {
        $this->reset('showModal');
    }

    //cerra cuenta
    public function openModalCerrarOrder()
    {
        $this->showModalCerrarOrder = !$this->showModalCerrarOrder;
    }
    public function cerrarModal()
    {
        $this->showModalCerrarOrder = false;
    }

    // funcion para actualizar el total de la cuenta
    public function getTotal()
    {
        $this->reset('total');
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/cuenta';
        $response = Http::withToken($user['token'])->get($url);
        $totalC =  $response->json('data');

        foreach ($this->tables as $table) {
            if ($table['id'] == $this->id_table) {
                foreach ($totalC  as $c) {
                    if ($c['id'] == $table['idCuenta']) {
                        $this->total = $c['total'];
                    }
                }
            }
        }
    }

    public function cerrarCuenta()
    {
        $table = '';

        foreach ($this->tables as $tablea) {
            if ($tablea['id'] == $this->id_table) {
                $table = $tablea;
            }
        }
        // dd($this->id_table);

        // $empleadoAux;

        $nombreEmpleado = '';

        foreach ($this->employees as $e) { //obtener el nombre del empleado 

            if ($table['idEmpleado'] == $e['id']) {
                $empleadoAux = $e;
                $nombreEmpleado = $e['nombre'];
            }
        }

        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        $user = session()->get('user');

        //crear la venta http://localhost:8080/venta/
        // body: {                  <- obtener de mesa(idEmpleado, nombre)
        // "nombreMesero":"Claudia",   
        // "nombreMesa":"mesa 1"
        //}


        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->post($url, [
            'nombreMesero' => $nombreEmpleado,
            'nombreMesa' => $table['nombre']
        ]);
        $idVenta = $response['data'];

        //http://localhost:8080/itemProduct/  creamos los productos en el almacenamiento auxiliar
        // body:{                    <- obtener de cuentaFinal(nombre,precio,cantidad,
        //                               mesa->idEmpleado, mesa->nombre)
        //     "nombre":"pay de queso",
        //     "precio":35.5,
        //     "cantidad":1,
        //     "idventa":1
        // }
        //  dd($this->cuenta);
        $url2 = config('app.api') . '/itemProduct/';
        foreach ($this->cuenta as $c) {
            $response = Http::withToken($user['token'])->post($url2, [
                'nombre' => $c['nombre'],
                'precio' => $c['precio'],
                'cantidad' => $c['cantidad'],
                'idventa' => $idVenta
            ]);

            foreach ($this->products as $p) {   ///incrementamos el contador de productos vendidos en el campo de productos
                if ($c['nombre'] == $p['nombre']) {
                    $pCantidad =  $p['contador'] + $c['cantidad'];

                    $url = config('app.api') . '/product/add/' . $p['id'];
                    $response = Http::withToken($user['token'])->put($url, [
                        'contador' => $pCantidad
                    ]);
                }
            }
        }
       

        //http://localhost:8080/cuenta/{id}       eliminar cuenta y por ende sus pedidos y pp
        $url = config('app.api') . '/cuenta/' . $table['idCuenta'];
        $response = Http::withToken($user['token'])->delete($url);

        //cambiamos el estado de la mesa a disponible 
        $url = config('app.api') . '/table/' .  $table['id'];
        $response = Http::withToken($user['token'])->put($url, [
            'nombre' => $table['nombre'],
            'status' => 1,
            'capacidad' => $table['capacidad'],
            'empleado' => $empleadoAux
        ]);
        // return Redirect::route('ticket.pedidoFinal', ['idAux3' => $this->idAux3]);
        redirect()->route('orders.index');
    }
}

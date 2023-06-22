<?php

namespace App\Http\Livewire\Orders;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;


class Update extends Component
{

    /* Variable encargada de mostrar la vista correspondiente de acuerdo a la fase en la que se encuentra */
    public $step = 2; // cambiar los valores entre 1 y 3 de forma manual

    /* ----------------------- Fase 1 -----------------------*/
    public $employee_id = ''; // Guarda el id del empleado seleccionado sin uso
    public $codigo_acceso = ''; // Guarda el codigo de Acceso ingresado en el input 

     /* variables con el contenido de la informacion */
     public $employees; // lista de los usuarios (meseros, admin, cajeros)
     public $categories;
     public $products;
     public $ordProd; ///contiene la relacion pedido-producto

     public $table; //guarda la mesa seleccionada
     public $cuenta; //guarda los productos pedidos en a la mesa 
     public $idVenta;

     public $total ;

     public $showModal = false;
     public $showModalDeleteOrder = false;
     public $showModalCerrarOrder= false;
     

     /* ----------------------- Fase 3 para ordenar nuevamente -----------------------*/
    public $options = [ // opciones para el producto que se agragara
        'size' => null,
        'category' => null,
        'description' => null,
        'image' => null
    ];
    public $description = ''; // Guarda la descripcion que le vamos a pasar al producto
    public $showModalDesc = false;
    public $productId= '';
    public $productTam= '';
    public $productCat= '';
    public $productImg= '';
    public $productDesc= '';

    // Variables para el buscador
    public $search = '';
    public $filterProducts;


    public $stock = 1; //hay que quitarlo despues
    public $activeTab;

    public function mount()
    {
        $this->filterProducts = $this->products;
    }

  
    public function render()
    {
        // dd($this->cuenta);
         $this -> getTotal();
        return view('livewire.orders.update');
    }

    /* ----------------------- STEP 1 -----------------------*/

    /* Metodo para validar el codigo del empleado */
    public function validatedEmployee()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/employee/search-id/' . $this->table['idEmpleado']; // localhost:8080/employee/search-id/{id}
        $response = Http::withToken($user['token'])->get($url);  
        $employeeA = $response ->json('data');
        

        $url = config('app.api') . '/employee/valid/' .$employeeA['id']; // localhost:8080/employee/valid/{id}
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

    /* ----------------------- STEP 2 -----------------------*/

    // funcion para actualizar el total de la cuenta
    public function getTotal()
    {
        $this -> reset('total');
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        
        $url = config('app.api') . '/cuenta';
        $response = Http::withToken($user['token'])->get($url);
        $totalC =  $response->json('data');

        foreach ($totalC  as $c ) {
            if ($c['id'] == $this ->table['idCuenta']) {
                $this->total = $c['total'];
            }
        }
    }

    public function cerrarCuenta()
    {

        // $empleadoAux;
        
        $nombreEmpleado = '' ;
       
        foreach ($this->employees as $e) { //obtener el nombre del empleado 
           
            if ($this->table['idEmpleado'] == $e['id'] ) {
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
        
        
        $url = config('app.api') . '/venta/' ;
        $response = Http::withToken($user['token'])->post($url, [
            'nombreMesero'=>$nombreEmpleado,
            'nombreMesa'=> $this->table['nombre']
        ]);
        $this->idVenta = $response['data'];
        
        //http://localhost:8080/itemProduct/  creamos los productos en el almacenamiento auxiliar
        // body:{                    <- obtener de cuentaFinal(nombre,precio,cantidad,
        //                               mesa->idEmpleado, mesa->nombre)
        //     "nombre":"pay de queso",
        //     "precio":35.5,
        //     "cantidad":1,
        //     "idventa":1
        // }
        //  dd($this->cuenta);
        $url2 = config('app.api') . '/itemProduct/' ;  //ruta para agregar productos para ventas            
        foreach ($this->cuenta as $c) {             
            $response = Http::withToken($user['token'])->post($url2, [
                'nombre'=>$c['nombre'],
                'precio'=>$c['precio'],
                'cantidad'=>$c['cantidad'],
                'idventa'=>$this->idVenta  ,    
            ]);
           
            foreach ($this->products as $p ) {   ///incrementamos el contador de productos vendidos en el campo de productos
                if($c['nombre'] == $p['nombre']){
                    $pCantidad =  $p['contador'] + $c['cantidad'];
                    
                    $url = config('app.api') . '/product/add/'. $p['id'] ;             
                    $response = Http::withToken($user['token'])->put($url,[
                        'contador'=> $pCantidad 
                    ]);    
                }
            }
        }  
        
        // //http://localhost:8080/cuenta/{id}       eliminar cuenta y por ende sus pedidos y pp
        // $url = config('app.api') . '/cuenta/'. $this->table['idCuenta']  ;      
        // $response = Http::withToken($user['token'])->delete($url);

        //cambiamos el estado de la mesa a disponible 
        $url = config('app.api') . '/table/' .  $this->table['id'] ;   
        $response = Http::withToken($user['token'])->put($url, [
            'nombre'=>$this->table['nombre'] ,
            'status'=>1,
            'capacidad'=>$this->table['capacidad'] ,
            'empleado'=>$empleadoAux              
        ]);
        // return Redirect::route('ticket.pedidoFinal', ['idAux3' => $this->idAux3]);
        redirect()->route('orders.index');
       



    }

    public function openModal()
    {
       $this->showModal = !$this->showModal ;
    }
    //cerra cuenta
    public function openModalCerrarOrder()
    {
        $this->showModalCerrarOrder = !$this->showModalCerrarOrder ;
    }
    public function cerrarModal()
    {
        $this->showModalCerrarOrder = false;
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

                    $url = config('app.api') . '/product/'. $p['id_Producto'];
                    $response = Http::withToken($user['token'])->get($url);
                    $producto = $response->json('data');

                    $pCantidad =  $p['cantidad'] + $producto['cancelados']; //sumamos el valor que tiene de cancelados con el de cantidad pedida del producto cancelado
                    
                    $url = config('app.api') . '/product/cancel/'.$p['id_Producto'];     ///editamos la cantidad de productos cancelados                
                    $response = Http::withToken($user['token'])->put($url,[
                        'contador'=> $pCantidad 
                    ]);                    
                }
            }
            
            $url = config('app.api') . '/order/'. $id;            
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

            $url = config('app.api') . '/order/product/'. $id; //me da todo el contendio de pedido producto
                    $response = Http::withToken($user['token'])->get($url);
                    $producto = $response->json('data');
            
            foreach ($this->products as $p) {
                if ($p['id'] == $producto['id_Producto']) {
                    
                    $pCantidad =  $producto['cantidad'] + $p['cancelados']; //sumamos el valor que tiene de cancelados con el de cantidad pedida del producto cancelado
                    
                    $url = config('app.api') . '/product/cancel/'.$p['id'];     ///editamos la cantidad de productos cancelados                
                    $response = Http::withToken($user['token'])->put($url,[
                        'contador'=> $pCantidad 
                    ]);  
                     
                }
            }

            $user = session()->get('user');
            $url = config('app.api') . '/order/product/'. $id;
                        
            $response = Http::withToken($user['token'])->delete($url);
    
            $response = $response->json('data');

            return redirect()->route('orders.index');
        }
    }

    public function openModalDeleteOrder()
    {
       $this->showModalDeleteOrder = !$this->showModalDeleteOrder ;
    }

     /* ----------------------- STEP 3 -----------------------*/
    //VOLVER A TOMAR ORDEN -> STEP 2 EN CREATE

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
        $this->reset(['description', 'showModalDesc']);
        
    }

     // Metodo para cerrar y visualzar el modal de descripcion
     public function openModalDescripcion()
     {
         $this->showModalDesc = !$this->showModalDesc;
               
     }
 
     public function seleccionDesc($rowId, $tamanio, $category, $image)
     {
         $this->productId = $rowId;
         $this->productTam = $tamanio;
         $this->productCat = $category;
         $this->productImg = $image;
         $this->productDesc = '';
 
         $this->showModalDesc = !$this->showModalDesc;
         
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
    public function destroy2()
    {
        $this->clear();
        $this->revers();
        $this->filterProducts = $this->products;
    }

     /* Metodo que aumentara el Step */
     public function continue()
     {
         $this->step++;
     }

     public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

     /* Metodo que decrementara el Step */
    public function revers()
    {
        $this->step--;
    }

    /* ----------------------- STEP 4 -----------------------*/
    //GENERAR LA ORDEN
     /* Metodo para generar la Orden (Pedido) */
     public function cretedOrder()
     {
         /* 
             consultar cuenta de mesa
             crear pedido con idcuenta y idmesa
             le meto los productos a pedido (Pedido - producto)
             crear ticket
         */
         if (!session()->get('user')) {
             return redirect()->route('auth.login');
         }
 
         $user = session()->get('user');
 
        //  /* Creo la cuenta */
        //  $url = config('app.api') . '/cuenta'; // localhost:8080/cuenta
        //  $response = Http::withToken($user['token'])->post($url, []);
        //  $cuenta = $response->json('data'); // id de cuenta
 
         if ($this->table['idCuenta']) {
             /* Creo el pedido (order)*/
             $url = config('app.api') . '/order'; // localhost:8080/order
             $response = Http::withToken($user['token'])->post($url, [
                 'idMesa' => $this->table['id'],
                 'idCuenta' => $this->table['idCuenta'],
             ]);
             $pedido = $response->json('data');
             //dd($pedido);
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
                 $this->step++;
             }
         }
        // $this->clear();
        
     }

    /* ----------------------- STEP 5 -----------------------*/
    //GENERAR EL TICKET
    public function createdTicket()
    {
        $this->clear();
        
        $this->reset(['step',  'employee_id', 'codigo_acceso', 'options', 'search']);
        
        redirect()->route('orders.index');
    }
}
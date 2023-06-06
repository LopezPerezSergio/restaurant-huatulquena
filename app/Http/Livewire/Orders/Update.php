<?php

namespace App\Http\Livewire\Orders;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Livewire\Component;


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

     public $table; //guarda la mesa seleccionada
     public $cuenta; //guarda los productos pedidos en a la mesa 

     public $total = 0;

    /* 
        $id_cuenta
    */
    public function render()
    {
        $this -> getTotal();
        return view('livewire.orders.update');
    }

    /* ----------------------- Fase 1 -----------------------*/

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

    /* ----------------------- Fase 2 -----------------------*/

    // funcion para actualizar el total de la cuenta
    public function getTotal()
    {
        $this -> reset('total');
        foreach ($this->cuenta as $c) {
            
            $this->total += $c['total'];
        }
    }

    /* ----------------------- Fase 3 -----------------------*/
        //cerra cuenta
    public function cerrarCuenta()
    {
        $empleadoAux;
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
        $idVenta = $response['data'];
        

        //http://localhost:8080/itemProduct/  creamos los productos en el almacenamiento auxiliar
        // body:{                    <- obtener de cuentaFinal(nombre,precio,cantidad,
        //                               mesa->idEmpleado, mesa->nombre)
        //     "nombre":"pay de queso",
        //     "precio":35.5,
        //     "cantidad":1,
        //     "idventa":1
        // }
        
        $url = config('app.api') . '/itemProduct/' ;   
            
        foreach ($this->cuenta as $c) {             
            $response = Http::withToken($user['token'])->post($url, [
                'nombre'=>$c['nombre'],
                'precio'=>$c['precio'],
                'cantidad'=>$c['cantidad'],
                'idventa'=>$idVenta              
            ]);
        }

        //http://localhost:8080/cuenta/{id}       eliminar cuenta y por ende sus pedidos y pp
        $url = config('app.api') . '/cuenta/'. $this->table['idCuenta']  ;      
        $response = Http::withToken($user['token'])->delete($url);

        //cambiamos el estado de la mesa a disponible 
        $url = config('app.api') . '/table/' .  $this->table['id'] ;   
        $response = Http::withToken($user['token'])->put($url, [
            'nombre'=>$this->table['nombre'] ,
            'status'=>1,
            'capacidad'=>$this->table['capacidad'] ,
            'empleado'=>$empleadoAux              
        ]);


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



    ///mostrar los pedidos y sus productos en la tabla que se muestra en step 2
    //ingresar a mesa y obtener los id de Pedidos 
    //ingresar a pp y comprara su idPedido con el idPedido de mesa 
    //Si coinciden los ids mostrar los productos por ordemes en tablas 
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InventoryController extends Controller
{
    public function index(){
    if (!session()->get('user')) {
        return redirect()->route('auth.login');
    }
    $user = session()->get('user');

    $url = config('app.api') . '/product';
    $response = Http::withToken($user['token'])->get($url);
    $productos = $response->json('data');

    $url = config('app.api') . '/inventory';
    $response = Http::withToken($user['token'])->get($url);
    $inventory = $response->json('data');

    // cantidadRestante sera por cada producto que encuentre en la tabla productos producto['nombre'] 
    // restara a inventory['cantidadRestante'] la cantidad que se ocupa por cada producto de la lista 
    // inventory['productos'] que coincida con productos['nombre]
    // $inventory = [
    //     [
    //         'id' => 1,
    //         'nombre' => 'Cerveza Stella Artois',
    //         'familia' => 'b',   
    //         'cantidad'=>'10',
    //         'productos'=> 'Michelada, Michelada Mediana',
    //         'unidad' => 'ENVASE',
    //         'cantidadRestante'=>'5',
    //     ],
    //     [
    //         'id' => 2,
    //         'familia' => 'l',
    //         'nombre' => 'licor',
    //         'unidad' => 'SHOT',
    //         'cantidad' => 200,
    //         'cantidadRestante'=>'50',
    //     ],
    //     [
    //         'id' => 3,
    //         'familia' => 'p',
    //         'nombre' => 'Filete de Res',
    //         'unidad' => 'kilogramos',
    //         'cantidad' => 3,
    //         'cantidadRestante'=>'1',
    //     ],
    // ];
    
    

        return view('admin.inventory.index', compact('inventory','productos'));
    }

        public function store(Request $request)
        {
            if (!session()->get('user')) {
                return redirect()->route('auth.login');
            }

            $user = session()->get('user');
            // Guardamos el inventario
            $url = config('app.api') . '/inventory';

            // $productos = $request->input('productos');

            $valores = explode(',', $request->input('productos'));
            //  $productosJson = json_encode($productos);
            //  dd($valores);

            $response = Http::withToken($user['token'])->post($url, [
                'nombre' => $request->nombre,
                'categoria' => $request->categoria,
                'cantidad' => $request->cantidad,
                'unidad' => $request->unidad,
                'status' => $request->has('status') ? 1 : 0,
                'productos' => $valores, 
                'contador' =>$request->contador,
                
            ]);

            $response = $response['data'];       

            session()->flash('alert-product', $response);

            return redirect()->route('inventory.index');

        }
    /**
         * Display the specified resource.
         */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

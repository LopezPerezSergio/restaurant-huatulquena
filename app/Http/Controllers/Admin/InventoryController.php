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

    //recuperar el inventario 
    $url = config('app.api') . '/inventory';
    $response = Http::withToken($user['token'])->get($url);
    $inventory = $response->json('data');
    

    // cantidadRestante sera por cada producto que encuentre en la tabla productos producto['nombre'] 
    // restara a inventory['cantidadRestante'] la cantidad que se ocupa por cada producto de la lista 
    // inventory['productos'] que coincida con productos['nombre] 
    
    return view('admin.inventory.index', compact('inventory','productos','inventory'));
}
public function store(Request $request)
{
    if (!session()->get('user')) {
        return redirect()->route('auth.login');
    }

    $user = session()->get('user');

    // Guardamos el producto
     $url = config('app.api') . '/inventory';
     $productos=explode(',', $request->input('productosID'));
    //  dd($productos);

     $response = Http::withToken($user['token'])->post($url, [
         'nombre' => $request->nombre,
         'categoria' => $request->categoria,
         'cantidad' => $request->cantidad,
         'status' => $request->has('status') ? 1 : 0,
         'contador' =>$request->contador,
         'unidad'=>$request->unidad,
         'productos' => $productos,
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
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $url = config('app.api') . '/inventory/'. $id;
        
        $response = Http::withToken($user['token'])->delete($url);

        $response = $response['data'];

        return redirect()->route('inventory.index');
    }
}

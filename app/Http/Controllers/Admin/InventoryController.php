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

    $inventory = [
        [
            'id' => 1,
            'familia' => 'b',
            'nombre' => 'Cerveza Stella Artois',
            'ubicacion' => 'a',
            'unidad' => 'l',
            'cantidad' => 10,
            'costo' => 50,
            'valor' => 500,
            'status' => 1,
        ],
        [
            'id' => 2,
            'familia' => 'l',
            'nombre' => 'licor',
            'ubicacion' => 'c',
            'unidad' => 'e',
            'cantidad' => 5,
            'costo' => 80,
            'valor' => 400,
            'status' => 1,
        ],
        [
            'id' => 3,
            'familia' => 'p',
            'nombre' => 'Filete de Res',
            'ubicacion' => 'r',
            'unidad' => 'k',
            'cantidad' => 3,
            'costo' => 150,
            'valor' => 450,
            'status' => 1,
        ],
    ];
    
    

    return view('admin.inventory.index', compact('inventory','productos'));
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

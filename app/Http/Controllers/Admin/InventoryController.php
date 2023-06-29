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
    $inventory = [
        [
            'id' => 1,
            'familia' => 'ce',
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
            'familia' => 'co',
            'nombre' => 'Helado de Vainilla',
            'ubicacion' => 'c',
            'unidad' => 'e',
            'cantidad' => 5,
            'costo' => 80,
            'valor' => 400,
            'status' => 1,
        ],
        [
            'id' => 3,
            'familia' => 'ca',
            'nombre' => 'Filete de Res',
            'ubicacion' => 'r',
            'unidad' => 'k',
            'cantidad' => 3,
            'costo' => 150,
            'valor' => 450,
            'status' => 1,
        ],
        [
            'id' => 4,
            'familia' => 've',
            'nombre' => 'Lechuga',
            'ubicacion' => 'a',
            'unidad' => 'p',
            'cantidad' => 20,
            'costo' => 10,
            'valor' => 200,
            'status' => 0,
        ],
    ];
    
    

    return view('admin.inventory.index', compact('inventory'));
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

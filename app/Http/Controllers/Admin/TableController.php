<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $tables = $response->json('data');

        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');

        //obtenemos el empleado 
        $url = config('app.api') . '/employee/search-id/' . 1;
        $response = Http::withToken($user['token'])->get($url);
        $employee = $response->collect('data');

        //guardamos la mesa
        $url = config('app.api') . '/table/';
        $response = Http::withToken($user['token'])->post($url,[
            'nombre' => $request->nombre,
            'status' => $request->has('status') ? 1 : 0,
            'capacidad' => $request->capacidad,            
            'empleado' => $employee
        ]);

        /* Aqui se deb de agregar cuenta junto 
          con mesa para que haya un mejor control */

        $response = $response['data'];

        session()->flash('alert-table', $response);

        return redirect()->route('orders.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $url = config('app.api') . '/table/';

        $response = Http::withToken($user['token'])->put($url,[
            'nombre' => $request->nombre,
            'capacidad' => $request->capacidad,
            'status' => $request->has('status') ? 1 : 0,
            'empleado' =>  $request->empleado
        ]);

        $response = $response['data'];
        session()->flash('alert-table', $response);
        
        return redirect()->route('table.index');
    }
}

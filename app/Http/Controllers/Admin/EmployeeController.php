<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session()->get('user');

        $url = config('app.api') . '/rol';
        $response = Http::withToken($user['token'])->get($url);
        $roles = $response->collect('data');

        return view('admin.employees.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = session()->get('user');

        $url = config('app.api') . '/rol/search-id/' . $request->rol;
        $response = Http::withToken($user['token'])->get($url);
        $rol = $response->collect('data');
        $rol = ['id' => $rol['id'], 'nombre' =>  $rol['nombre']];

        //Guardamos el empleado
        $url = config('app.api') . '/employee/';
        $response = Http::withToken($user['token'])->post($url, [
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'status' => $request->has('status') ? 1 : 0,
            'sueldo' => $request->sueldo,
            'codigoAcceso' => $request->codigoAcceso,
            'rol' => $rol /* { id => 1, nombre => 'nombre} */
        ]);

        $response = $response['data'];

        session()->flash('alert-employee', $response);

        return redirect()->route('employees.index');
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

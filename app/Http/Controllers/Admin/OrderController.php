<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
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

        $url = config('app.api') . '/category';
        $response = Http::withToken($user['token'])->get($url);
        $categories = $response->json('data');

        $url = config('app.api') . '/rol';
        $response = Http::withToken($user['token'])->get($url);
        $roles = $response->json('data');

        $url = config('app.api') . '/table';        
        $response = Http::withToken($user['token'])->get($url);        
        $tables = $response->json('data');

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->json('data');

        // Solo los usarios de admin mesero y cajero <-------------- Pendiente
        foreach ($roles as $rol) {
            if ($rol['nombre'] == 'Mesero') {
                $employees = $rol['empleados'];
                break;
            }
        }

        // recuperar mesas;

        // pasar mesas
        return view('admin.orders.index', compact('categories', 'employees', 'user', 'tables', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

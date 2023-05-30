<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class PaymentController extends Controller
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

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $employees = $response->json('data');

        $url = config('app.api') . '/paymets/';
        $response = Http::withToken($user['token'])->get($url);
        $payments = $response->json('data');

        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->get($url);
        $ventas = $response->json('data');

        return view('admin.payments.index', compact('employees', 'payments', 'ventas'));
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
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $url = config('app.api') . '/paymets/';

        $response = Http::withToken($user['token'])->post($url, [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'pago' => $request->pago
        ]);

        return redirect()->route('nominas.index');
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
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        $user = session()->get('user');
        $url = config('app.api') . '/paymets/'. $id;
        
        $response = Http::withToken($user['token'])->delete($url);

        $response = $response['data'];

        return redirect()->route('nominas.index');
    }
}

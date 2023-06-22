<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RolController extends Controller
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

        $url = config('app.api') . '/rol';

        $response = Http::withToken($user['token'])->get($url);
        $roles = $response->collect('data');

        return view('admin.roles.index', compact('roles'));
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

        $url = config('app.api') . '/rol/';
        $response = Http::withToken($user['token'])->post($url, [
            'nombre' => $request->nombre,
        ]);
        
        $response = $response['data'];
        session()->flash('alert-rol', $response);

        return redirect()->route('roles.index');
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
      
        $url = config('app.api') . '/rol/'.$id;
        
        // dd($request);
        $response = Http::put($url, [
            'nombre' => $request->nombre,
        ]);
        // dd($response);

        $response = $response['data'];
        session()->flash('alert-rol', $response);
        
        return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

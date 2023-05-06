<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
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
        $categories = $response->collect('data');

        $url = config('app.api') . '/product';
        $response = Http::withToken($user['token'])->get($url);
        $products = $response->collect('data');

        //return view('livewire.tables.products');
        return view('admin.products.index', compact('categories', 'products'));
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

        $url = config('app.api') . '/category/' . $request->categoria;
        $response = Http::withToken($user['token'])->get($url);
        $category = $response->collect('data');
        $category = ['id' => $category['id'], 'nombre' =>  $category['nombre']];

        //Subo la imagen al servidor
        // $url_img = $request->has('url_img') ? Storage::disk('local')->
        //     put('public/products', $request->file('url_img')) : 
        //         'public/images/base_image_productos.png'; // genero la Url -> public/products/nomnbre-de-producto

        // Guardamos el producto
         $url = config('app.api') . '/product';

         $response = Http::withToken($user['token'])->post($url, [
             'nombre' => $request->nombre,
             'tamanio' => $request->tamanio,
             'precio' => $request->precio,
             'status' => $request->has('status') ? 1 : 0,
             'contador' => 0,
             'url_img' => "urlPendiente :)",
             'categoria' => $category
         ]);
 
         $response = $response['data'];
 
         session()->flash('alert-product', $response);
 
         return redirect()->route('products.index');

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
        
        $url = config('app.api') . '/category/' . $request->categoria;        
        $response = Http::withToken($user['token'])->get($url);
        $category = $response->collect('data');
        $category = ['id' => $category['id'], 'nombre' =>  $category['nombre']];

         // Actualizamos el producto
         $url = config('app.api') . '/product/'. $id;

         $response = Http::withToken($user['token'])->put($url, [
             'nombre' => $request->nombre,
             'tamanio' => $request->tamanio,
             'precio' => $request->precio,
             'status' => $request->has('status') ? 1 : 0,
             'contador' => 1,
             'url_img' => "urlPendienteActuali :)",
             'categoria' => $category
         ]);
         
         $response = $response['data'];
         session()->flash('alert-product', $response);
 
         return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

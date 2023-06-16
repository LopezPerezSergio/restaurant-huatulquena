<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SaleController extends Controller
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

        $url = config('app.api') . '/venta/';
        $response = Http::withToken($user['token'])->get($url);
        $ventas = $response->json('data');
        //dd($ventas);        //dd($ventas);
        $url = config('app.api') . '/table';
        $response = Http::withToken($user['token'])->get($url);
        $mesas = $response->json('data');

        $url = config('app.api') . '/employee';
        $response = Http::withToken($user['token'])->get($url);
        $empleados = $response->json('data');
        // Convertir el array de ventas en una colección
        $ventasCollection = collect($ventas);

        // Configurar la paginación
        $currentPage = Paginator::resolveCurrentPage('page');
        $perPage = 10; // Cantidad de elementos por página
        $ventasPaginadas = new LengthAwarePaginator(
            $ventasCollection->forPage($currentPage, $perPage),
            $ventasCollection->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('admin.sales.index', compact('ventas', 'mesas', 'empleados'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }
        // $user = session()->get('user');

        // $url = config('app.api') . '/rol';
        // $response = Http::withToken($user['token'])->get($url);
        // $roles = $response->json('data');

        // $url = config('app.api') . '/employee';
        // $response = Http::withToken($user['token'])->get($url);
        // $employees = $response->json('data');

        // return view('admin.dashboard', compact('roles', 'employees'));
        return view('admin.dashboard');
    }
}

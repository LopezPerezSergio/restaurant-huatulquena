<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (!session()->get('user')) {
            return redirect()->route('auth.login');
        }

        return view('admin.dashboard');
    }
}

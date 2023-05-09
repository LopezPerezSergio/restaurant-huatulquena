<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller
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

        $url = config('app.api') . '/user';
        $response = Http::withToken($user['token'])->get($url);
        $users = $response->json('data');

        return view('admin.users.index',  compact('users'));
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

        $url = config('app.api') . '/user';
        $response = Http::withToken($user['token'])->post($url, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'cel' => $request->cel,
            'roles' => $request->roles
            
        ]);

        $response = $response['data'];

        session()->flash('alert-user', $response);

        return redirect()->route('users.index');
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

        $url = config('app.api') . '/user/' . $id;
        
        $response = Http::withToken($user['token'])->put($url, [
            'name' => $request->name,
            'email' => $request->email,
            'cel' => $request->cel,
            'password' => $request->password,
            'roles' => $request->roles
            
        ]);
        

        //$response = $response['data'];

        //session()->flash('alert-user', $response);

        return redirect()->route('users.index');
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
        $url = config('app.api') . '/user/'. $id;
        
        $response = Http::withToken($user['token'])->delete($url);

        //$response = $response['data'];
        
        // session()->flash('alert-product', $response);

        return redirect()->route('users.index');
    }
}

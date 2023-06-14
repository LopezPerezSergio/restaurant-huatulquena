<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.index');
    }

    public function authenticate(Request $request)
    {
        $url = config('app.api') . '/login/auth';

        $response = Http::post($url, [          // Endpoint con los datos
            'username' => $request->username,
            'password' => $request->password,
        ]);

        /*  Datos Incorrectos(Usuario y contraseña) la respuesta es:
                {
                    "httpCode":401,
                    "data":['false'],
                    "mensage":"usuario inexistente"
                } 
            
            Datos Incorrectos(contraseña) la respuesta es: null
                (Poner un mensaje de igual manera con la misma estructura)

            Datos correctos la respuesta es:
                {
                    "httpCode":202,
                    "data":{
                        "user":"clau10998",
                        "rol":"administrador",
                        "token":"eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJjbGF1MTA5OTgiLCJpYXQiOjE2ODIxMTk3NTAsImV4cCI6MTY4MjEyMzM1MH0.m7E2ye0RPDp9H7Dl2STybqUXUcZd24ZcBG3deqW6I_s"},
                        "mensage":"Ok"
                    }
                }
        */
        try {
            if ($response->json()) { // Verifico si los datos que mande son correctos
                $dataUser = $response->collect('data');

                session()->put(['user' => ['token' => $dataUser['token'], 'user' => $dataUser['user'], 'rol' => $dataUser['rol']]]);
                //return session()->get('user');
                if ($dataUser['rol'] == 'admin' ) {
                    return redirect()->route('dashboard');
                }
                
                return redirect()->route('orders.index');
            }

            return back()->withInput();

        } catch (\Throwable $th) {

            return back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('status', 'Sesión cerrada exitosamente');
    }
    public function Desconectarse(Request $request) {

        Session::invalidate();
        Session::regenerateToken();
    
        return response()->json(['logout' => true]);
    }
}

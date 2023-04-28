<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (session()->get('user')) {
            $user = session()->get('user');
            $url = config('app.api') . '/login/valid/token/' . $user['token']; //http://localhost:8080/login/valid/token
            
            $response = Http::get($url);
            $validate_token = $response->collect('data');

            if ($validate_token) {
                // Usuario autenticado, continuar con la solicitud
                return $next($request);
            }

            session()->forget('user');
        }

        // Usuario no autenticado, redirigir a la página de inicio de sesión
        return redirect()->route('auth.login');
    }
}

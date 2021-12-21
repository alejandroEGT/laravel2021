<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Perfil_usuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //si el usuario logeado es de perfil 2(usuario) continuar
        if (Auth::user()->perfil == '2') {
            return $next($request);
            
        }
        return response()->json('(usuario)proceso truncado');
    }
}

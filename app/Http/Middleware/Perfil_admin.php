<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Perfil_admin
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
        //si el usuario logeado es de perfil 1(admin) continuar
        if (Auth::user()->perfil == '1') {
            return $next($request);
            
        }
        return response()->json('(admin)proceso truncado');
        
    }
}

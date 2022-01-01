<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioDoctor
{
    public function handle(Request $request, Closure $next)
    {
        //si el usuario no se ha autenticado, redirigimos a la pagina de login
        if (Auth::guest()) {
            return redirect('/login');
        }
        //si el usuario se ha autenticado, pero no es doctor lo mandamos a la página principal
        if (!Auth::user()->esDoctor) {
            return redirect('/');
        }

        return $next($request);
    }
}

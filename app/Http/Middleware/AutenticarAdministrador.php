<?php

namespace App\Http\Middleware;

use Closure;

class AutenticarAdministrador
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

        static $idUsuario = 1;

        if(auth()->guest())
        {
            return redirect('Login');
        }
        else
        {
            if(auth()->user()->id_perfil != $idUsuario)
            {
                return redirect('Inicio');
            }
        }

        return $next($request);
    }
}

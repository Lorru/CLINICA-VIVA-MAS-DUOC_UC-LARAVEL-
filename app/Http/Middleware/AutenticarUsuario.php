<?php

namespace App\Http\Middleware;

use Closure;

class AutenticarUsuario
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
        if(auth()->guest())
        {
            return redirect('Login');
        }

        return $next($request);
    }
}

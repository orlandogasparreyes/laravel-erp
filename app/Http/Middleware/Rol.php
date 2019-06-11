<?php

namespace App\Http\Middleware;

use Closure;

class Rol
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
        $roles = func_get_args();//Extraer todos los parametros de una función
        $roles = array_slice($roles,2);//Extraer excepto los primeros 2

        if (auth()->user()->tipo === $roles[0]) {
            return $next($request);
        }

        return redirect(route("sin-acceso"));
    }
}

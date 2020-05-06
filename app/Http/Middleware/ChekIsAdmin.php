<?php

namespace App\Http\Middleware;

use Closure;

class ChekIsAdmin
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
        //Redireciona caso não esteja logado
        if (!auth()->check())
            return redirect()->back();

        //Redireciona caso não sela um administrador. Consulta table User na coluna is_admin(boolean)
        //Deve-se ainda registra-lo em Http\Kernel.php, em no método $routeMiddleware, adicione 'admin' => \App\Http\Middleware\ChekIsAdmin::class,
        if (!auth()->user()->is_admin)
            return redirect()->back();

        return $next($request);
    }
}

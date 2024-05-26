<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario tiene el rol de administrador
        if ($request->user() && $request->user()->rol === 'admin') {
            // El usuario es un administrador, permitir el acceso
            return $next($request);
        }

        // El usuario no es un administrador, puedes redirigirlo a alguna otra página o devolver un error 403 Forbidden
        abort(403, 'Acceso no autorizado');
    }
}

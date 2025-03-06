<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión.');
        }

        if (!auth()->user()->admin) {
            return redirect('/')->with('error', 'No tienes permisos para acceder.');
        }

        return $next($request);
    }
}


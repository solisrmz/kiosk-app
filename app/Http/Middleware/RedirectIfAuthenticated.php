<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return redirect('/admin');
                    break;
                case 'asesor':
                    return redirect('/asesor');
                    break;
                case 'director':
                    return redirect('/direccion-academica');
                    break;
                case 'docente':
                    return redirect('/docente');
                    break;
                case 'consulta':
                    return redirect('/consulta');
            }
        }
        return $next($request);
    }
}

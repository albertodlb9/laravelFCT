<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('/'); // Redirige al login si no está autenticado
        }

        // Verifica si el usuario tiene uno de los roles proporcionados

        $user = Auth::user();

        
        // Si el usuario no tiene alguno de los roles, redirige o retorna un error
        if (!$user->rols()->whereIn('name', $roles)->exists()) {
            return redirect()->route('dashboard'); // Respuesta de "no autorizado"
        }

        // Si tiene uno de los roles, permite que el flujo continúe
        return $next($request);
    }
}


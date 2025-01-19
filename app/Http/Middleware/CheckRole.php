<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{

    public function handle(Request $request, Closure $next, string $role)
    {
        //dd(Auth::user()->role);
        echo $role;
        // Vérifier que l'utilisateur est authentifié et possède le rôle requis
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers login si non connecté
        }
        if ( Auth::user()->role !== $role) {
            abort(403, 'Accès refusé.');
        }

        return $next($request);
    }
}

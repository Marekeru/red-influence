<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            abort(403, 'Zugriff verweigert');
        }

        // Rollen-Array aus der Middleware (z. B. 'admin,editor')
        $rolesArray = explode(',', $roles);

        if (!in_array(Auth::user()->role, $rolesArray)) {
            abort(403, 'Zugriff verweigert');
        }

        return $next($request);
    }
}

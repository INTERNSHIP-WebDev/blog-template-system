<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Check if the guard is 'guests'
            if ($guard === 'guests') {
                return redirect('/guests');
            }

            // Default redirect for other guards (e.g., 'web')
            return redirect('/home');
        }

        return $next($request);
    }
}
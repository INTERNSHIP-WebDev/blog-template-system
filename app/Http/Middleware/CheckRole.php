<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has any of the specified roles other than 'guest'
            if (!in_array('Guest', $roles) && Auth::user()->hasAnyRole(array_diff($roles, ['Guest']))) {
                return $next($request);
            }
        }

        // Redirect the user if they do not have the required role or if they are a guest
        return redirect()->route('guests.index')->with('error', 'Unauthorized action.');
    }
}

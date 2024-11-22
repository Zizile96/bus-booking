<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAuthenticatedUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Check if the user is authenticated
        if (Auth::guard($guard)->check()) {
            // Redirect to a specific route if authenticated
            return redirect()->route('home'); // Change 'home' to your desired route
        }

        return $next($request);
    }
}


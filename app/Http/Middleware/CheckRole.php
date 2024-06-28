<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
{
    // Check if user is authenticated
    if (!Auth::check()) {
        return redirect('login');
    }

    // Check if user has any of the specified roles
    foreach ($roles as $role) {
        if (Auth::user()->hasRole($role)) {
            return $next($request);
        }
    }

    // Redirect unauthorized users
    return redirect('home')->with('error', 'Unauthorized.');
}

}

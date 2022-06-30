<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If no current logged in user, redirect to the login page.
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}

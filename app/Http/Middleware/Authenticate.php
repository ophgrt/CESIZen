<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        return $next($request);
    }
    
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
        return route('login.form');
    }
}
}


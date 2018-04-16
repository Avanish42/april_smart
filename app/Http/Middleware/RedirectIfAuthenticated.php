<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if(Auth::user()->hasRole('admin'))
            {
                return redirect()->intended('home');
            }

            elseif(Auth::user()->hasRole('manager'))
            {
                return redirect()->intended('manager-dashboard');
            }
            elseif (Auth::user()->hasRole('cashier')){
                return redirect()->intended('cashier-dashboard');
            }
        }

        return $next($request);
    }
}

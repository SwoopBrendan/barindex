<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
            if (Auth::user()->isAdmin()) {
                return RouteServiceProvider::ADMIN;
            } elseif (Auth::user()->isBarOwner()) {
                return RouteServiceProvider::BAROWNER;
            } elseif (Auth::user()->isBartender()) {
                return RouteServiceProvider::BARTENDER;
            } elseif (Auth::user()->isCustomer()) {
                return RouteServiceProvider::CUSTOMER;
            } else {
                return RouteServiceProvider::HOME;
            }
        }

        return $next($request);
    }
}

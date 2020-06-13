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

        switch ($guard){

            case 'health_care_provider':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('health_provider.admin');
                }
                break;

            case 'health_care_employee':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('health_employee');
                }
                break;

            case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('admin');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return $next($request);
                }
                break;
        }

        return $next($request);
    }
}

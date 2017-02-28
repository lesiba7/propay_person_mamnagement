<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
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

        //dd("Test Auth");
        $user = User::latest()->get();
        
        if (Auth::guard($guard)->check()) {
           
            return redirect('/home');
        }

        return $next($request);
    }
}

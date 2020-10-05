<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if($request->isMethod('GET')){
            if(!($request->is('*.png') || $request->is('login'))){
                if (Auth::check()!==1) {
                    return redirect('/login');
                }
            }
        }
        return $next($request);
    }
}

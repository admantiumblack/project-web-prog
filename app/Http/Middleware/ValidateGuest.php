<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateGuest
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
        if($request->hasCookie('user_auth')){
            return redirect()->route('home');
        }
        return $next($request);
    }
}

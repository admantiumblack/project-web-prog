<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateDean
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
        if(!$request->hasCookie('user_auth')){
            return redirect()->back();
        }
        $role = explode('_', $request->cookie('user_auth'))[1];
        if(!strcmp('Dean', $role)){
            return redirect()->back();
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateLecturer
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
            return redirect()->route('login');
        }
        $role = explode('_', $request->cookie('user_auth'))[1];
        if(strcmp('Lecturer', $role) != 0){
            return redirect()->back();
        }
        return $next($request);
    }
}

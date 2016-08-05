<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class BasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Auth::logout();
        // $login_name = Auth::user()->id;
        //if($login_name == "auttawir")
        //return  $next($request);
        //return $next($request);
        return Auth::onceBasic('emid') ?: $next($request);
    }
}

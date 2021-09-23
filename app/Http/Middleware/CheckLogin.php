<?php

namespace App\Http\Middleware;

use Closure;
session_start();
class CheckLogin
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
        if(!$_SESSION['username']){
            return  redirect('logout');
        }
        return $next($request);
    }
}

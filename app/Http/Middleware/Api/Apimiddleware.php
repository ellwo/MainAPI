<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;

class Apimiddleware
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


       // if ( !$request->expectsJson() && $request->user()==null) {
         //   return response(['status'=>'unAuth'],401);
       // }
        return $next($request);
    }
}

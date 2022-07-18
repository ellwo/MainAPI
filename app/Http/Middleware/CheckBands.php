<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBands
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()!=null){
            $user=auth()->user();
            if($user->isBanned())
            {
                $days=now()->diffInDays( $user->bans->pluck('expired_at')->first());
                $message="عذرا حسابك مقفل لمدة ".$days." يوم";

                auth()->logout();
                session()->flash('status',$message);


                return redirect()->route('login')->with('status',$message)->with('error_login',$message)->with('email',$user->email);


            }



        }

        return $next($request);
    }
}

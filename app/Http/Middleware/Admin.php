<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::user()!=null){
            if(Auth::user()->role == UserType::Admin && Auth::user()->status == true){
                return $next($request);
            }
            if(Auth::user()->role == UserType::Admin && Auth::user()->status == false){
                Auth::logout();
                return redirect('/login')->with('failure','Unauthorized access');
            }
        }
        return redirect('/')->with('failure','Unauthorized access');
    }
}

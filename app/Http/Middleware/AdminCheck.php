<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
        // if(!Auth::check()){
        //     return redirect()->route('index');
        // }

        $user = Auth::user();
        if($user->isAdmin === 0){
            return redirect()->route('index');
        }

        return $next($request);
    }
}

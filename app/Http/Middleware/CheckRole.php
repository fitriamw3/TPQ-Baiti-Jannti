<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /** 
       * @param \Illuminate\Http\Request
       * @param \Closure
       * @return mixed
    */

    public function handle($request, Closure $next, ...$roles){
        if(in_array($request->user()->role,$roles)){
            return $next($request);
        }
        return redirect('login');
    }
    
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckManager
{

    public function handle($request, Closure $next)
    {
    
        if (auth()->User()->roles[0]->name=='Manager'){
            return redirect('/manager');
        }
       
        return $next($request);   
    }
}
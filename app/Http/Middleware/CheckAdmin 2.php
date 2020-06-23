<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{

    public function handle($request, Closure $next)
    {
        if (!auth()->User()){
            return redirect('login');
        }
        if (auth()->User()->roles[0]->name!='Admin'){
            return redirect('home');
        }
        if (auth()->User()->roles[0]->name==='Admin'){
            return $next($request);
        }
        return redirect('warning');
    }
    
}

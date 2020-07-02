<?php

namespace App\Http\Middleware;

use Closure;

class CheckDashboard
{

    public function handle($request, Closure $next)
    {
        if (auth()->User()->roles[0]->name=='Admin'){
            return redirect('/admin');
        }
        if (auth()->User()->roles[0]->name=='Manager'){
            return redirect('/manager');
        }
        if (auth()->User()->roles[0]->name=='Student'){
            return redirect('/dashboard');
        }

        return $next($request);   
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccess
{

    public function handle($request, Closure $next)
    {
        //dd(auth()->User()->roles[0]->name);
        if (!auth()->User()){
            return redirect('login');
        }
        if (auth()->User()->access==='no'){
            return redirect('/warning');
        }
        return $next($request);   
    }
}

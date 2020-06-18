<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccess
{

    public function handle($request, Closure $next)
    {
        if (!auth()->User()){
            return redirect('welcome');
        }
        if (auth()->User()->access==='no'){
            return redirect('/warning');
        }
        return $next($request);   
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccess
{

    public function handle($request, Closure $next)
    {
        dd($request->route()->parameter());
        if (!$request->user){
            return redirect('login');
        }
        if ($request->user()->access==='no'){
            dd($request->user()->access);
            return redirect('/warning');
        }
        return $next($request);
    }

}

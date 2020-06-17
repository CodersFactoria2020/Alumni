<?php

namespace App\Http\Middleware;

use Closure;

class CheckAcces
{
    public function __construc(Guard $auth){
        $this->auth=$auth;
    }
    public function handle($request, Closure $next)
    {
        if (!$request->user()->access){
            dd($request->user()->access);
            return redirect('/warning');
            //return redirect('login');
        }
        if ($request->user()->access==='no'){
            return redirect('/warning');
        }
        dd($request->user()->access);
        return $next($request);
    }
}


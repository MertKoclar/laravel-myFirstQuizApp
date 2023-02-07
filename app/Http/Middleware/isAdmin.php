<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->type!=='admin'){
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}

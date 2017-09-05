<?php

namespace App\Http\Middleware;

use Closure;
use Gate;

class Status
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
        if(Gate::denies('status')){
           return redirect('/home');
        }
        return $next($request);
    }
}

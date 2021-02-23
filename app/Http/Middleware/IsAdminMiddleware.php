<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminMiddleware
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
        // if admin
        if(auth()->check() && auth()->user()->is_customer == 0){
            return $next($request);
        }
        // else if customer
        return redirect()->route('customer.index');
    }
}

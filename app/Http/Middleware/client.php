<?php

namespace App\Http\Middleware;

use Closure;

class client
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
//        if (! $request->expectsJson()) {
//            return route('login');
//        }

        $isAdmin =auth()->guard('client');
        if($isAdmin){
            return $next($request);
        }
        return redirect('store/login');

        return $next($request);
    }
//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
//    }
}

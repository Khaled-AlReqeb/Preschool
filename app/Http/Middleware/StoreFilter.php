<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class StoreFilter
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
        $store = $request->route('store');
        Session()->put('store', $store);

        URL::defaults([
            'store' => $store,
        ]);
        Route::current()->forgetParameter('store');

        return $next($request);
    }
}

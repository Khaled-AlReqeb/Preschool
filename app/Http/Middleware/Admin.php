<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        $isAdmin = User::where('id',Session::get('user_id'))->first()->is_admin;
        if($isAdmin == 1){
            return $next($request);
        }
        return redirect('/home');
    }
}

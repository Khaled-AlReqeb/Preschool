<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Auth;

class SetLocalLanguage
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
        if(Auth::guard('admin')->check() ){
            $locale = isAPI()? request()->header('Accept-Language') : Auth::guard('admin')->user()->main_language ;
            App\Model\User::query()->where('id',Auth::guard('admin')->user()->id)->firstOrFail()->update([
                'main_language' => $locale
            ]);
        }elseif(Auth::guard('api')->check() ){
            $locale = isAPI()? request()->header('Accept-Language') : Auth::guard('api')->user()->main_language ;
            App\Model\User::query()->where('id',Auth::guard('api')->user()->id)->firstOrFail()->update([
                'main_language' => $locale
            ]);
        }else{
            $locale = isAPI()? request()->header('Accept-Language') :   app()->getLocale() ;
        }

        if(!$locale || !in_array($locale,['ar','en'])) $locale = 'ar';
        app()->setLocale($locale);
        return $next($request);
    }
}

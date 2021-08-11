<?php

namespace App\Providers;

use App\Model\GeneralSetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('settings', function(){
            return GeneralSetting::query()->first();
        });
        app()->singleton('pannel_type', function(){
            return optional(GeneralSetting::query()->first())->pannel_type??'one_store';
        });
        app()->singleton('pannel_main_color', function(){
            return optional(GeneralSetting::query()->first())->pannel_main_color??'#579ac7';
        });
        app()->singleton('pannel_secondary_color', function(){
            return optional(GeneralSetting::query()->first())->pannel_secondary_color??'#2876ab';
        });
        app()->singleton('fast_access_color', function(){
            return optional(GeneralSetting::query()->first())->fast_access_color??'#F64E60 ';
        });
        app()->singleton('pannel_mood', function(){
            return optional(GeneralSetting::query()->first())->pannel_mood??'light';
        });
        app()->singleton('is_multi_store', function(){
            return optional(GeneralSetting::query()->first())->pannel_type == 'multi_store';
        });
    }
}

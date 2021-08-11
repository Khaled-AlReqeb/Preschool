<?php

namespace App\Http\Controllers;

use App\Model\GeneralSetting;
use App\Model\Servcie;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = GeneralSetting::find(1);
        return view('website.home' , compact('settings'));
    }

    public function error($status){
        switch($status){
            case 401:
                $view = 'errors/401';
            break;
            case 403:
                $view = 'errors/403';
            break;
            case 404:
                $view = 'errors/404';
            break;
            case 419:
                $view = 'errors/419';
            break;
            case 429:
                $view = 'errors/429';
            break;
            case 500:
                $view = 'errors/500';
            break;
            case 503:
                $view = 'errors/503';
            break;
        }
        return view($view);
    }

}

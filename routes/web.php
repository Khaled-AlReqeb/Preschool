<?php

use Illuminate\Support\Facades\Route;


Route::get('/locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    Session::put('locale', $locale);
    if (Session::get('user_id')) {
        \App\Model\User::where('id', Session::get('user_id'))->update(['main_language' => $locale]);
    }
    return redirect()->back();
});
Route::get('/mood/{mood}', function ($mood) {
    $settings = \App\Model\GeneralSetting::query()->first();
    if($settings){
        $settings->update(['pannel_mood' => $mood]);
    }
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'admintz'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.doLogin');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::post('/forget', 'AdminAuth\ForgotPasswordController@forget')->name('admin.forget');
    Route::get('/change_password/{forgetCode}/{email}', 'AdminAuth\ForgotPasswordController@changePasswordForm')->name('admin.changePassword');
    Route::post('/reset', 'AdminAuth\ForgotPasswordController@reset')->name('admin.reset');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return redirect(\route('home'));
});
//Route::post('/logout', 'HomeController@logout')->name('home.logout');



Route::group(['prefix' => 'store'], function () {
    Route::get('/index', 'Store\HomeController@index')->name('store.index');


    Route::get('/login', 'Store\loginController@index')->name('store.login');
    Route::post('/post-login', 'Store\loginController@postLogin');
    Route::get('/register', 'Store\loginController@register')->name('store.register');
    Route::post('/post-register', 'Store\loginController@postRegister');
    Route::post('/logout', 'Store\loginController@logout')->name('store.logout');


    Route::get('/cart', 'Store\HomeController@cart')->name('store.cart');
    Route::post('/cart', 'Store\HomeController@storeOrder')->name('cart.order.store');
//    Route::post('/cart', 'Store\HomeController@storeOrder')->name('cart.order.store')->middleware('auth:client');
    Route::get('/add-to-cart/{id}', 'Store\HomeController@addToCart');
    Route::patch('/update-cart', 'Store\HomeController@update');
    Route::delete('/remove-from-cart', 'Store\HomeController@remove');

    Route::get('/product/{id}', 'Store\productController@index')->name('product.show');
    Route::get('/category/{id}', 'Store\CategoryController@index')->name('category.index');
//    Route::get('/category/{name}', 'Store\CategoryController@index')->name('category.index');

});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/error/{status}','HomeController@error')->name('error');

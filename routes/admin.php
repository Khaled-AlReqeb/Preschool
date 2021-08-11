<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'HomeController@home')->name('admin');
    Route::get('/home', 'HomeController@home')->name('home');

    // abort
    Route::get('/404', function () {
        return view('admin.errors.404');
    })->name('404');

    //common
    Route::group(['prefix' => 'common'], function () {
        Route::get('/loadUsers', 'CommonController@loadUsers')->name('loadUsers');
        Route::get('/loadRoles', 'CommonController@loadRoles')->name('loadRoles');
        Route::get('/loadBrands', 'CommonController@loadBrands')->name('loadBrands');
        Route::get('/loadStores', 'CommonController@loadStores')->name('loadStores');
        Route::get('/loadCities', 'CommonController@loadCities')->name('loadCities');
        Route::get('/loadProducts', 'CommonController@loadProducts')->name('loadProducts');
        Route::get('/loadCountries', 'CommonController@loadCountries')->name('loadCountries');
        Route::get('/loadCurrencies', 'CommonController@loadCurrencies')->name('loadCurrencies');
        Route::get('/loadContinents', 'CommonController@loadContinents')->name('loadContinents');
        Route::get('/loadPhoneCodes', 'CommonController@loadPhoneCodes')->name('loadPhoneCodes');
        Route::get('/loadCategories', 'CommonController@loadCategories')->name('loadCategories');
        Route::get('/loadSubCategories', 'CommonController@loadSubCategories')->name('loadSubCategories');
        Route::get('/loadSubProperties/{id}', 'CommonController@loadSubProperties')->name('loadSubProperties');
        Route::get('/loadProductProperties', 'CommonController@loadProductProperties')->name('loadProductProperties');
    });

    //profile
    Route::get('/profile/{user_id}', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

    // settings
    Route::group(['prefix' => 'settings'], function () {
        // general
        Route::get('/general', 'GeneralSettingsController@edit')->name('settings.general.edit');
        Route::post('/general/update', 'GeneralSettingsController@update')->name('settings.general.update');

        //static_pages
        Route::get('/static_pages/index', 'StaticPagesController@index')->name('settings.static_pages.index');
        Route::get('/static_pages/load', 'StaticPagesController@load')->name('settings.static_pages.load');
        Route::get('/static_pages/edit/{id}', 'StaticPagesController@edit')->name('settings.static_pages.edit');
        Route::post('/static_pages/update', 'StaticPagesController@update')->name('settings.static_pages.update');
        // store features
        Route::get('/store_features', 'StoreFeaturesController@index')->name('settings.store_features.index');
        Route::get('/store_features/load', 'StoreFeaturesController@load')->name('settings.store_features.load');
        Route::post('/store_features/delete', 'StoreFeaturesController@destroy')->name('settings.store_features.destroy');
        Route::post('/store_features/disable', 'StoreFeaturesController@disable')->name('settings.store_features.disable');
        Route::post('/store_features/activate', 'StoreFeaturesController@activate')->name('settings.store_features.activate');
        Route::get('/store_features/create', 'StoreFeaturesController@create')->name('settings.store_features.create');
        Route::post('/store_features/store', 'StoreFeaturesController@store')->name('settings.store_features.store');
        Route::get('/store_features/edit/{id}', 'StoreFeaturesController@edit')->name('settings.store_features.edit');
        Route::post('/store_features/update', 'StoreFeaturesController@update')->name('settings.store_features.update');
        //send notifications
        Route::get('/admin_notifications', 'AdminNotificationsController@index')->name('settings.admin_notifications.index');
        Route::get('/admin_notifications/load', 'AdminNotificationsController@load')->name('settings.admin_notifications.load');
        Route::post('/admin_notifications/delete', 'AdminNotificationsController@destroy')->name('settings.admin_notifications.destroy');
        Route::get('/admin_notifications/create', 'AdminNotificationsController@create')->name('settings.admin_notifications.create');
        Route::post('/admin_notifications/store', 'AdminNotificationsController@store')->name('settings.admin_notifications.store');

        //roles
        Route::get('/roles', 'RolesController@index')->name('settings.roles.index');
        Route::post('/roles/delete', 'RolesController@destroy')->name('settings.roles.destroy');
        Route::get('/roles/create', 'RolesController@create')->name('settings.roles.create');
        Route::get('/roles/details/{id}', 'RolesController@show')->name('settings.roles.show');
        Route::post('/roles/store', 'RolesController@store')->name('settings.roles.store');
        Route::get('/roles/edit/{id}', 'RolesController@edit')->name('settings.roles.edit');
        Route::post('/roles/update', 'RolesController@update')->name('settings.roles.update');
        Route::post('/roles/update_role/{id}', 'RolesController@updateRole')->name('settings.roles.update_role');

        //admin_accounts
        Route::get('/admin_accounts', 'AdminAccountsController@index')->name('settings.admin_accounts.index');
        Route::get('/admin_accounts/load', 'AdminAccountsController@load')->name('settings.admin_accounts.load');
        Route::post('/admin_accounts/delete', 'AdminAccountsController@destroy')->name('settings.admin_accounts.destroy');
        Route::get('/admin_accounts/create', 'AdminAccountsController@create')->name('settings.admin_accounts.create');
        Route::get('/admin_accounts/details/{id}', 'AdminAccountsController@show')->name('settings.admin_accounts.show');
        Route::post('/admin_accounts/store', 'AdminAccountsController@store')->name('settings.admin_accounts.store');
        Route::get('/admin_accounts/edit/{id}', 'AdminAccountsController@edit')->name('settings.admin_accounts.edit');
        Route::post('/admin_accounts/update', 'AdminAccountsController@update')->name('settings.admin_accounts.update');
        Route::post('/admin_accounts/update_role/{id}', 'AdminAccountsController@updateRole')->name('settings.admin_accounts.update_role');

        // currencies
        Route::get('/currencies', 'CurrenciesController@index')->name('settings.currencies.index');
        Route::get('/currencies/load', 'CurrenciesController@load')->name('settings.currencies.load');
        Route::post('/currencies/delete', 'CurrenciesController@destroy')->name('settings.currencies.destroy');
        Route::post('/currencies/disable', 'CurrenciesController@disable')->name('settings.currencies.disable');
        Route::post('/currencies/activate', 'CurrenciesController@activate')->name('settings.currencies.activate');
        Route::get('/currencies/create', 'CurrenciesController@create')->name('settings.currencies.create');
        Route::post('/currencies/store', 'CurrenciesController@store')->name('settings.currencies.store');
        Route::get('/currencies/edit/{id}', 'CurrenciesController@edit')->name('settings.currencies.edit');
        Route::post('/currencies/update', 'CurrenciesController@update')->name('settings.currencies.update');

        // faqs
        Route::get('/faqs', 'FaqsController@index')->name('settings.faqs.index');
        Route::get('/faqs/load', 'FaqsController@load')->name('settings.faqs.load');
        Route::post('/faqs/delete', 'FaqsController@destroy')->name('settings.faqs.destroy');
        Route::post('/faqs/disable', 'FaqsController@disable')->name('settings.faqs.disable');
        Route::post('/faqs/activate', 'FaqsController@activate')->name('settings.faqs.activate');
        Route::get('/faqs/create', 'FaqsController@create')->name('settings.faqs.create');
        Route::post('/faqs/store', 'FaqsController@store')->name('settings.faqs.store');
        Route::get('/faqs/edit/{id}', 'FaqsController@edit')->name('settings.faqs.edit');
        Route::post('/faqs/update', 'FaqsController@update')->name('settings.faqs.update');

        // walkthroughs
        Route::get('/walkthroughs', 'WalkthroughsController@index')->name('settings.walkthroughs.index');
        Route::get('/walkthroughs/load', 'WalkthroughsController@load')->name('settings.walkthroughs.load');
        Route::post('/walkthroughs/delete', 'WalkthroughsController@destroy')->name('settings.walkthroughs.destroy');
        Route::post('/walkthroughs/disable', 'WalkthroughsController@disable')->name('settings.walkthroughs.disable');
        Route::post('/walkthroughs/activate', 'WalkthroughsController@activate')->name('settings.walkthroughs.activate');
        Route::get('/walkthroughs/create', 'WalkthroughsController@create')->name('settings.walkthroughs.create');
        Route::post('/walkthroughs/store', 'WalkthroughsController@store')->name('settings.walkthroughs.store');
        Route::get('/walkthroughs/edit/{id}', 'WalkthroughsController@edit')->name('settings.walkthroughs.edit');
        Route::post('/walkthroughs/update', 'WalkthroughsController@update')->name('settings.walkthroughs.update');
    });
    // users
    Route::get('/stores', 'StoresController@index')->name('stores.index');
    Route::get('/stores/load', 'StoresController@load')->name('stores.load');
    Route::post('/stores/delete', 'StoresController@destroy')->name('stores.destroy');
    Route::post('/stores/disable', 'StoresController@disable')->name('stores.disable');
    Route::post('/stores/activate', 'StoresController@activate')->name('stores.activate');
    Route::get('/stores/create', 'StoresController@create')->name('stores.create');
    Route::post('/stores/store', 'StoresController@store')->name('stores.store');
    Route::get('/stores/edit/{id}', 'StoresController@edit')->name('stores.edit');
    Route::post('/stores/update', 'StoresController@update')->name('stores.update');
    Route::get('/stores/product_properties/{store_id}', 'ProductPropertiesController@store_product_properties_index')->name('stores.product_properties.index');

    Route::post('/stores/product_properties/add/{store_id}', 'ProductPropertiesController@store_product_properties_add')->name('stores.product_properties.add');
    Route::post('/stores/product_properties/destroy', 'ProductPropertiesController@store_product_properties_destroy')->name('stores.destroy');
    Route::post('/stores/product_properties/disable', 'ProductPropertiesController@store_product_properties_disable')->name('stores.disable');
    Route::post('/stores/product_properties/activate', 'ProductPropertiesController@store_product_properties_activate')->name('stores.activate');

    Route::get('/stores/unselected_main_properties_load/{store_id}', 'ProductPropertiesController@unselected_store_product_properties_load')->name('stores.unselected_main_properties_load');
    Route::get('/stores/selected_store_product_properties_load/{store_id}', 'ProductPropertiesController@selected_store_product_properties_load')->name('stores.selected_store_product_properties_load');

    // users
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/load', 'UsersController@load')->name('users.load');
    Route::post('/users/delete', 'UsersController@destroy')->name('users.destroy');
    Route::post('/users/disable', 'UsersController@disable')->name('users.disable');
    Route::post('/users/activate', 'UsersController@activate')->name('users.activate');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('/users/update', 'UsersController@update')->name('users.update');
    //store owners
    Route::get('/store_owners', 'UsersController@storeOwners')->name('store_owners.index');
    Route::get('/store_owners/load', 'UsersController@loadStoreOwners')->name('store_owners.load');

    // categories
    Route::get('/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/categories/load', 'CategoriesController@load')->name('categories.load');
    Route::post('/categories/delete', 'CategoriesController@destroy')->name('categories.destroy');
    Route::post('/categories/disable', 'CategoriesController@disable')->name('categories.disable');
    Route::post('/categories/activate', 'CategoriesController@activate')->name('categories.activate');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
    Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
    Route::post('/categories/update', 'CategoriesController@update')->name('categories.update');

    // services
    Route::get('/services', 'ServicesController@index')->name('services.index');
    Route::get('/services/load', 'ServicesController@load')->name('services.load');
    Route::post('/services/delete', 'ServicesController@destroy')->name('services.destroy');
    Route::post('/services/disable', 'ServicesController@disable')->name('services.disable');
    Route::post('/services/activate', 'ServicesController@activate')->name('services.activate');
    Route::get('/services/create', 'ServicesController@create')->name('services.create');
    Route::post('/services/store', 'ServicesController@store')->name('services.store');
    Route::get('/services/edit/{id}', 'ServicesController@edit')->name('services.edit');
    Route::post('/services/update', 'ServicesController@update')->name('services.update');

    // orders
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/load', 'OrderController@load')->name('orders.load');
    Route::post('/orders/delete', 'OrderController@destroy')->name('orders.destroy');
//    Route::get('/orders/create', 'OrderController@create')->name('orders.create');
//    Route::post('/orders/store', 'OrderController@store')->name('orders.store');
    Route::get('/orders/show/{id}', 'OrderController@show')->name('orders.edit');
//    Route::get('/orders/edit/{id}', 'OrderController@edit')->name('orders.edit');
//    Route::post('/orders/update', 'OrderController@update')->name('orders.update');

    // brands
    Route::get('/brands', 'BrandsController@index')->name('brands.index');
    Route::get('/brands/load', 'BrandsController@load')->name('brands.load');
    Route::post('/brands/delete', 'BrandsController@destroy')->name('brands.destroy');
    Route::post('/brands/disable', 'BrandsController@disable')->name('brands.disable');
    Route::post('/brands/activate', 'BrandsController@activate')->name('brands.activate');
    Route::get('/brands/create', 'BrandsController@create')->name('brands.create');
    Route::post('/brands/store', 'BrandsController@store')->name('brands.store');
    Route::get('/brands/edit/{id}', 'BrandsController@edit')->name('brands.edit');
    Route::post('/brands/update', 'BrandsController@update')->name('brands.update');

    // subCategories
    Route::get('/subCategories/{category_id}', 'SubCategoriesController@index')->name('subCategories.index');
    Route::get('/subCategories/{category_id}/load', 'SubCategoriesController@load')->name('subCategories.load');
    Route::post('/subCategories/{category_id}/delete', 'SubCategoriesController@destroy')->name('subCategories.destroy');
    Route::post('/subCategories/{category_id}/disable', 'SubCategoriesController@disable')->name('subCategories.disable');
    Route::post('/subCategories/{category_id}/activate', 'SubCategoriesController@activate')->name('subCategories.activate');
    Route::get('/subCategories/{category_id}/create', 'SubCategoriesController@create')->name('subCategories.create');
    Route::post('/subCategories/{category_id}/store', 'SubCategoriesController@store')->name('subCategories.store');
    Route::get('/subCategories/{category_id}/edit/{id}', 'SubCategoriesController@edit')->name('subCategories.edit');
    Route::post('/subCategories/{category_id}/update', 'SubCategoriesController@update')->name('subCategories.update');

    //Products
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/products/load', 'ProductsController@load')->name('products.load');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/products/store', 'ProductsController@store')->name('products.store');
    Route::post('/products/delete', 'ProductsController@destroy')->name('products.destroy');
    Route::get('/products/edit/{id}', 'ProductsController@edit')->name('products.edit');
    Route::post('/products/update/{id}', 'ProductsController@update')->name('products.update');
    Route::post('/products/disable', 'ProductsController@disable')->name('products.disable');
    Route::post('/products/activate', 'ProductsController@activate')->name('products.activate');
    Route::post('/uploadProductImages/{id}', 'ProductsController@uploadProductImages')->name('uploadProductImages');
    Route::post('/removeImage/{id}', 'ProductsController@removeImage')->name('removeImage');

    //main_products_properties
    Route::get('/product_properties/main_products_properties', 'ProductPropertiesController@main_properties_index')->name('main_properties.index');
    Route::get('/product_properties/main_properties/load', 'ProductPropertiesController@main_properties_load')->name('main_properties.load');
    Route::get('/product_properties/main_properties/create', 'ProductPropertiesController@main_properties_create')->name('main_properties.create');
    Route::post('/product_properties/main_properties/store', 'ProductPropertiesController@main_properties_store')->name('main_properties.store');

    Route::post('/products_properties/main_properties/delete', 'ProductPropertiesController@main_properties_destroy')->name('main_properties.destroy');
    Route::get('/products_properties/main_properties/edit/{id}', 'ProductPropertiesController@main_properties_edit')->name('main_properties.edit');
    Route::post('/products_properties/main_properties/update/{id}', 'ProductPropertiesController@main_properties_update')->name('main_properties.update');
    Route::post('/products_properties/main_properties/disable', 'ProductPropertiesController@main_properties_disable')->name('main_properties.disable');
    Route::post('/products_properties/main_properties/activate', 'ProductPropertiesController@main_properties_activate')->name('main_properties.activate');

    //main_sub_properties
    Route::get('/product_properties/main_sub_properties/load/{id}', 'ProductPropertiesController@main_sub_properties_load')->name('main_sub_properties.load');
    Route::get('/product_properties/main_sub_properties/create/{id}', 'ProductPropertiesController@main_sub_properties_create')->name('main_sub_properties.create');
    Route::post('/product_properties/main_sub_properties/store/{id}', 'ProductPropertiesController@main_sub_properties_store')->name('main_sub_properties.store');

    Route::post('/products_properties/main_sub_properties/delete', 'ProductPropertiesController@main_sub_properties_destroy')->name('main_sub_properties.destroy');
    Route::get('/products_properties/main_sub_properties/edit/{id}', 'ProductPropertiesController@main_sub_properties_edit')->name('main_sub_properties.edit');
    Route::post('/products_properties/main_sub_properties/update/{id}', 'ProductPropertiesController@main_sub_properties_update')->name('main_sub_properties.update');
    Route::post('/products_properties/main_sub_properties/disable', 'ProductPropertiesController@main_sub_properties_disable')->name('main_sub_properties.disable');
    Route::post('/products_properties/main_sub_properties/activate', 'ProductPropertiesController@main_sub_properties_activate')->name('main_sub_properties.activate');

    //product_property

    Route::get('/product_properties/product_property/load/{id}', 'ProductPropertiesController@product_properties_load')->name('product_properties.load');
    Route::post('/product_properties/product_property/store/{id}', 'ProductPropertiesController@product_property_store')->name('product_property.store');

    Route::post('/products_properties/product_property/delete', 'ProductPropertiesController@product_property_destroy')->name('product_property.destroy');
    Route::post('/products_properties/product_property/update/{id}', 'ProductPropertiesController@product_property_update')->name('product_property.update');

    // banners
    Route::get('/banners', 'BannersController@index')->name('banners.index');
    Route::get('/banners/load', 'BannersController@load')->name('banners.load');
    Route::post('/banners/delete', 'BannersController@destroy')->name('banners.destroy');
    Route::post('/banners/disable', 'BannersController@disable')->name('banners.disable');
    Route::post('/banners/activate', 'BannersController@activate')->name('banners.activate');
    Route::get('/banners/create', 'BannersController@create')->name('banners.create');
    Route::post('/banners/store', 'BannersController@store')->name('banners.store');
    Route::get('/banners/edit/{id}', 'BannersController@edit')->name('banners.edit');
    Route::post('/banners/update', 'BannersController@update')->name('banners.update');

    // countries
    Route::get('/countries', 'CountriesController@index')->name('countries.index');
    Route::get('/countries/load', 'CountriesController@load')->name('countries.load');
    Route::post('/countries/delete', 'CountriesController@destroy')->name('countries.destroy');
    Route::post('/countries/phoneCode/delete', 'CountriesController@destroyPhoneCode')->name('countries.destroyPhoneCode');
    Route::post('/countries/disable', 'CountriesController@disable')->name('countries.disable');
    Route::post('/countries/activate', 'CountriesController@activate')->name('countries.activate');
    Route::get('/countries/create', 'CountriesController@create')->name('countries.create');
    Route::post('/countries/store', 'CountriesController@store')->name('countries.store');
    Route::get('/countries/edit/{id}', 'CountriesController@edit')->name('countries.edit');
    Route::post('/countries/update', 'CountriesController@update')->name('countries.update');

    // cities
    Route::get('/cities', 'CitiesController@index')->name('cities.index');
    Route::get('/cities/load', 'CitiesController@load')->name('cities.load');
    Route::post('/cities/delete', 'CitiesController@destroy')->name('cities.destroy');
    Route::post('/cities/disable', 'CitiesController@disable')->name('cities.disable');
    Route::post('/cities/activate', 'CitiesController@activate')->name('cities.activate');
    Route::get('/cities/create', 'CitiesController@create')->name('cities.create');
    Route::post('/cities/store', 'CitiesController@store')->name('cities.store');
    Route::get('/cities/edit/{id}', 'CitiesController@edit')->name('cities.edit');
    Route::post('/cities/update', 'CitiesController@update')->name('cities.update');

    // adminContacts
    Route::get('/adminContacts', 'AdminContactsController@index')->name('adminContacts.index');
    Route::get('/adminContacts/load', 'AdminContactsController@load')->name('adminContacts.load');
    Route::get('/adminContacts/details/{id}', 'AdminContactsController@show')->name('adminContacts.show');
    Route::post('/adminContacts/delete', 'AdminContactsController@destroy')->name('adminContacts.destroy');

    //Attributes
    Route::get('/attributes', 'AttributesController@index')->name('attributes.index');
    Route::get('/attributes/load', 'AttributesController@load')->name('attributes.load');
    Route::get('/attributes/create', 'AttributesController@create')->name('attributes.create');
    Route::post('/attributes/store', 'AttributesController@store')->name('attributes.store');
    Route::post('/attributes/delete', 'AttributesController@destroy')->name('attributes.destroy');
    Route::get('/attributes/edit/{id}', 'AttributesController@edit')->name('attributes.edit');
    Route::post('/attributes/update/{id}', 'AttributesController@update')->name('attributes.update');

    //Product Attributes
    Route::get('/products/{product}/attributes', 'ProductAttributesController@index')->name('product_attributes.index');
    Route::get('/products/{product}/attributes/load', 'ProductAttributesController@load')->name('product_attributes.load');
    Route::get('/products/{product}/attributes/create', 'ProductAttributesController@create')->name('product_attributes.create');
    Route::post('/products/{product}/attributes/store', 'ProductAttributesController@store')->name('product_attributes.store');
    Route::post('/products/{product}/attributes/delete', 'ProductAttributesController@destroy')->name('product_attributes.destroy');
    Route::get('/products/{product}/attributes/edit/{id}', 'ProductAttributesController@edit')->name('product_attributes.edit');
    Route::post('/products/{product}/attributes/update/{id}', 'ProductAttributesController@update')->name('product_attributes.update');
});

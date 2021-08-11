<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('root-user', function ($user) {
            return $user->role_id == 1;
        });
        Gate::define('setting-view', function ($user) {
            return $user->hasPermission('setting-view');
        });

        //users
        Gate::define('user-view', function ($user) {
            return $user->hasPermission('user-view');
        });
        Gate::define('user-edit', function ($user) {
            return $user->hasPermission('user-edit');
        });
        Gate::define('user-create', function ($user) {
            return $user->hasPermission('user-create');
        });
        Gate::define('user-delete', function ($user) {
            return $user->hasPermission('user-delete');
        });

        //stores-owners
        Gate::define('store-owner-view', function ($user) {
            return $user->hasPermission('store-owner-view');
        });
        Gate::define('store-owner-edit', function ($user) {
            return $user->hasPermission('store-owner-edit');
        });
        Gate::define('store-owner-create', function ($user) {
            return $user->hasPermission('store-owner-create');
        });
        Gate::define('store-owner-delete', function ($user) {
            return $user->hasPermission('store-owner-delete');
        });
        //countries
        Gate::define('country-view', function ($user) {
            return $user->hasPermission('country-view');
        });
        Gate::define('country-edit', function ($user) {
            return $user->hasPermission('country-edit');
        });
        Gate::define('country-create', function ($user) {
            return $user->hasPermission('country-create');
        });
        Gate::define('country-delete', function ($user) {
            return $user->hasPermission('country-delete');
        });
        //categories
        Gate::define('category-view', function ($user) {
            return $user->hasPermission('category-view');
        });
        Gate::define('category-edit', function ($user) {
            return $user->hasPermission('category-edit');
        });
        Gate::define('category-create', function ($user) {
            return $user->hasPermission('category-create');
        });
        Gate::define('category-delete', function ($user) {
            return $user->hasPermission('category-delete');
        });
        //services
        Gate::define('service-view', function ($user) {
            return $user->hasPermission('service-view');
        });
        Gate::define('service-edit', function ($user) {
            return $user->hasPermission('service-edit');
        });
        Gate::define('service-create', function ($user) {
            return $user->hasPermission('service-create');
        });
        Gate::define('service-delete', function ($user) {
            return $user->hasPermission('service-delete');
        });
        //orders
        Gate::define('order-view', function ($user) {
            return $user->hasPermission('order-view');
        });
        Gate::define('order-edit', function ($user) {
            return $user->hasPermission('order-edit');
        });
        Gate::define('order-create', function ($user) {
            return $user->hasPermission('order-create');
        });
        Gate::define('order-delete', function ($user) {
            return $user->hasPermission('order-delete');
        });
        //cities
        Gate::define('city-view', function ($user) {
            return $user->hasPermission('city-view');
        });
        Gate::define('city-edit', function ($user) {
            return $user->hasPermission('city-edit');
        });
        Gate::define('city-create', function ($user) {
            return $user->hasPermission('city-create');
        });
        Gate::define('city-delete', function ($user) {
            return $user->hasPermission('city-delete');
        });
        //currencies
        Gate::define('currency-view', function ($user) {
            return $user->hasPermission('currency-view');
        });
        Gate::define('currency-edit', function ($user) {
            return $user->hasPermission('currency-edit');
        });
        Gate::define('currency-create', function ($user) {
            return $user->hasPermission('currency-create');
        });
        Gate::define('currency-delete', function ($user) {
            return $user->hasPermission('currency-delete');
        });
        //banners
        Gate::define('banner-view', function ($user) {
            return $user->hasPermission('banner-view');
        });
        Gate::define('banner-edit', function ($user) {
            return $user->hasPermission('banner-edit');
        });
        Gate::define('banner-create', function ($user) {
            return $user->hasPermission('banner-create');
        });
        Gate::define('banner-delete', function ($user) {
            return $user->hasPermission('banner-delete');
        });
        //walkthroughs
        Gate::define('walkthrough-view', function ($user) {
            return $user->hasPermission('walkthrough-view');
        });
        Gate::define('walkthrough-edit', function ($user) {
            return $user->hasPermission('walkthrough-edit');
        });
        Gate::define('walkthrough-create', function ($user) {
            return $user->hasPermission('walkthrough-create');
        });
        Gate::define('walkthrough-delete', function ($user) {
            return $user->hasPermission('walkthrough-delete');
        });
        //faqs
        Gate::define('faq-view', function ($user) {
            return $user->hasPermission('faq-view');
        });
        Gate::define('faq-edit', function ($user) {
            return $user->hasPermission('faq-edit');
        });
        Gate::define('faq-create', function ($user) {
            return $user->hasPermission('faq-create');
        });
        Gate::define('faq-delete', function ($user) {
            return $user->hasPermission('faq-delete');
        });
        //contacts
        Gate::define('contact-view', function ($user) {
            return $user->hasPermission('contact-view');
        });
        Gate::define('contact-edit', function ($user) {
            return $user->hasPermission('contact-edit');
        });
        Gate::define('contact-create', function ($user) {
            return $user->hasPermission('contact-create');
        });
        Gate::define('contact-delete', function ($user) {
            return $user->hasPermission('contact-delete');
        });
        //pages
        Gate::define('page-view', function ($user) {
            return $user->hasPermission('page-view');
        });
        Gate::define('page-edit', function ($user) {
            return $user->hasPermission('page-edit');
        });
        Gate::define('page-create', function ($user) {
            return $user->hasPermission('page-create');
        });
        Gate::define('page-delete', function ($user) {
            return $user->hasPermission('page-delete');
        });
        //store-features
        Gate::define('store-feature-view', function ($user) {
            return $user->hasPermission('store-feature-view');
        });
        Gate::define('store-feature-edit', function ($user) {
            return $user->hasPermission('store-feature-edit');
        });
        Gate::define('store-feature-create', function ($user) {
            return $user->hasPermission('store-feature-create');
        });
        Gate::define('store-feature-delete', function ($user) {
            return $user->hasPermission('store-feature-delete');
        });
        //admin-notifications
        Gate::define('admin-notification-view', function ($user) {
            return $user->hasPermission('admin-notification-view');
        });

        Gate::define('admin-notification-create', function ($user) {
            return $user->hasPermission('admin-notification-create');
        });
        Gate::define('admin-notification-delete', function ($user) {
            return $user->hasPermission('admin-notification-delete');
        });
        //stores
        Gate::define('store-view', function ($user) {
            return $user->hasPermission('store-view');
        });
        Gate::define('store-edit', function ($user) {
            return $user->hasPermission('store-edit');
        });
        Gate::define('store-create', function ($user) {
            return $user->hasPermission('store-create');
        });
        Gate::define('store-delete', function ($user) {
            return $user->hasPermission('store-delete');
        });
        //brands
        Gate::define('brand-view', function ($user) {
            return $user->hasPermission('brand-view');
        });
        Gate::define('brand-edit', function ($user) {
            return $user->hasPermission('brand-edit');
        });
        Gate::define('brand-create', function ($user) {
            return $user->hasPermission('brand-create');
        });
        Gate::define('brand-delete', function ($user) {
            return $user->hasPermission('brand-delete');
        });
        //products
        Gate::define('product-view', function ($user) {
            return $user->hasPermission('product-view');
        });
        Gate::define('product-edit', function ($user) {
            return $user->hasPermission('product-edit');
        });
        Gate::define('product-create', function ($user) {
            return $user->hasPermission('product-create');
        });
        Gate::define('product-delete', function ($user) {
            return $user->hasPermission('product-delete');
        });

        //products properties
        Gate::define('view-product-property', function ($user) {
            return $user->hasPermission('view-product-property');
        });
        Gate::define('attribute', function ($user) {
            return $user->hasPermission('attribute');
        });


    }
}

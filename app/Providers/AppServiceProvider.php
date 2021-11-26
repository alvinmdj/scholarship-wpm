<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        // Register the new public path for production.

        // The content of this register method for the deployed application as follow:
        // $this->app->bind('path.public', function() {
        //     return realpath(base_path() . '/../public_html');
        // });

        // Try 'dd(base_path(), public_path());' when needed, to look at the correct path
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}

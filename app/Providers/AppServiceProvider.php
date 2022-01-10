<?php

namespace App\Providers;

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
        //w
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         \URL::forceScheme('https');
    }
}

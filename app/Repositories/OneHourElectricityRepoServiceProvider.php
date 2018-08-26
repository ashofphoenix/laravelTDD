<?php
namespace App\Repositories;


use Illuminate\Support\ServiceProvider;


class OneHourElectricityRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\OneHourElectricityInterface', 'App\Repositories\OneHourElectricityRepository');
    }
}
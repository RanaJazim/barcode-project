<?php

namespace App\Providers;

use App\Custom\Notification\AlertNotification;
use App\Custom\Notification\INotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(INotification::class, function($app) {
            return new AlertNotification();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('module.alert', 'alert');
        Blade::component('module.form', 'form');
        Blade::component('module.model', 'model');
        Blade::component('module.navigateButton', 'navigate');
        Blade::component('module.table', 'table');
        Blade::component('module.well', 'well');
        Blade::component('module.widget', 'widget');
    }
}

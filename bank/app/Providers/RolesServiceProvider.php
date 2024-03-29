<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use  App\Services\RolesService;
class RolesServiceProvider extends ServiceProvider
{
 
    public function register(): void
    {
        $this->app->singleton(RolesService::class, function (Application $app) {
            return new RolesService($app);
        });
    }


    public function boot(): void
    {
        //
    }
}

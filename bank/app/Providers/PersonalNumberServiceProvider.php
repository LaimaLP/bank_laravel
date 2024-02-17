<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Services\PersonalNumberService;

class PersonalNumberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PersonalNumberService::class, function ($code) {
            return new PersonalNumberService($code);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

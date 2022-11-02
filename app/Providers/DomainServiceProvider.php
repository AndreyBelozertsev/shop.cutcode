<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Auth\Providers\AuthServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(
            AuthServiceProvider::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

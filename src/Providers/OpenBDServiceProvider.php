<?php

namespace Revolution\OpenBD\Providers;

use GuzzleHttp\Client;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Revolution\OpenBD\Contracts\Factory;
use Revolution\OpenBD\OpenBD;

class OpenBDServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            Factory::class,
            function ($app) {
                return new OpenBD(new Client());
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [Factory::class];
    }
}

<?php

namespace Revolution\OpenBD\Providers;

use Illuminate\Support\ServiceProvider;

use Revolution\OpenBD\OpenBD;
use Revolution\OpenBD\OpenBDInterface;

class OpenBDServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

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
        $this->app->singleton(OpenBDInterface::class, function ($app) {
            return new OpenBD();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [OpenBDInterface::class];
    }
}

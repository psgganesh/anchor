<?php

namespace App\Modules\Shared\Traits;

use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\Facades\Schema;

trait ServiceProviderHelpers
{
    /**
     * A method to setup - init defaults
     */
    public function setupBootParams()
    {
        if ($this->app->runningUnitTests()) {
            Schema::defaultStringLength(191);
        }
    }

    /**
     * A method to check and register DuskServiceProvider only if on local
     */
    public function setTestEnvironment()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    /**
     * For global use to register global observers
     */
    public function registerObservers()
    {
        // Customer::observe(CustomerObserver::class);
    }

    public function enforceSSLConfig($url)
    {
        if (config('app.enforce_https')) {
            $url->forceScheme('https');
        }
    }
}
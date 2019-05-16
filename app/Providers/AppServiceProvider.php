<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use App\Modules\Shared\Traits\ServiceProviderHelpers;

class AppServiceProvider extends ServiceProvider
{
    use ServiceProviderHelpers;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setTestEnvironment();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url, Request $request)
    {
        $this->enforceSSLConfig($url);
        $this->setupBootParams();
        $this->registerObservers();
    }
}

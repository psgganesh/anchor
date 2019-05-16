<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * Bind every module's repository like below shown example
     * $this->app->bind(
     *      'App\Modules\<Module name>\Repositories\RepositoryInterface',
     *      'App\Modules\<Module name>\Repositories\ConfigRepository'
     * );
     *
     * @return void
     */
    public function register()
    {
        // Authorization module
        $this->app->bind('App\Modules\Account\Repositories\User\UserRepositoryInterface', 'App\Modules\Account\Repositories\User\UserRepository');
        $this->app->bind('App\Modules\Account\Repositories\Role\RoleRepositoryInterface', 'App\Modules\Account\Repositories\Role\RoleRepository');
        $this->app->bind('App\Modules\Account\Repositories\Permission\PermissionRepositoryInterface', 'App\Modules\Account\Repositories\Permission\PermissionRepository');

        // Other modules
    }
}

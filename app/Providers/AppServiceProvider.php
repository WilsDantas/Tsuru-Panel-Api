<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    AuthRepositoryInterface,
    PermissionRepositoryInterface,
};
use App\Repositories\{
    AuthRepository, 
    PermissionRepository, 
};

use App\Observers\{
    TenantObserver,
    UserObserver,
    PermissionObserver,
};

use App\Models\{
    Tenant,
    User,  
    Permission,
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class,
        );
        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Tenant::observe(TenantObserver::class);
        User::observe(UserObserver::class);
        Permission::observe(PermissionObserver::class);
    }
}

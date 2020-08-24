<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    AuthRepositoryInterface,
    PermissionRepositoryInterface,
    ProfileRepositoryInterface,
    permissionProfileRepositoryInterface,
};
use App\Repositories\{
    AuthRepository, 
    PermissionRepository,
    ProfileRepository,
    permissionProfileRepository,
};

use App\Observers\{
    TenantObserver,
    UserObserver,
    PermissionObserver,
    ProfileObserver,
};

use App\Models\{
    Tenant,
    User,  
    Permission,
    Profile,
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
        $this->app->bind(
            ProfileRepositoryInterface::class,
            ProfileRepository::class,
        );
        $this->app->bind(
            permissionProfileRepositoryInterface::class,
            permissionProfileRepository::class,
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
        Profile::observe(ProfileObserver::class);
    }
}

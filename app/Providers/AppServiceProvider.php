<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    AuthRepositoryInterface,
    PermissionRepositoryInterface,
    ProfileRepositoryInterface,
    PermissionProfileRepositoryInterface,
    CategoryRepositoryInterface,
    BrandRepositoryInterface,
};

use App\Repositories\{
    AuthRepository, 
    PermissionRepository,
    ProfileRepository,
    PermissionProfileRepository,
    CategoryRepository,
    BrandRepository,
};

use App\Observers\{
    TenantObserver,
    UserObserver,
    PermissionObserver,
    ProfileObserver,
    CategoryObserver,
    BrandObserver,
};

use App\Models\{
    Tenant,
    User,  
    Permission,
    Profile,
    Category,
    Brand
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
            PermissionProfileRepositoryInterface::class,
            PermissionProfileRepository::class,
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class,
        );
        $this->app->bind(
            BrandRepositoryInterface::class,
            BrandRepository::class,
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
        Category::observe(CategoryObserver::class);
        Brand::observe(BrandObserver::class);
    }
}

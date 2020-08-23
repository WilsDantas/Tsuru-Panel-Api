<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    AuthRepositoryInterface,
};
use App\Repositories\{
    AuthRepository,  
};

use App\Observers\{
    TenantObserver,
    UserObserver,
};

use App\Models\{
    Tenant,
    User,   
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
    }
}

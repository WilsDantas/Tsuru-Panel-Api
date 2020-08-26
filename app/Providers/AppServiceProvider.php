<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    AuthRepositoryInterface,
    PermissionRepositoryInterface,
    ProfileRepositoryInterface,
    PermissionProfileRepositoryInterface,
    CategoryRepositoryInterface,
    SubCategoryRepositoryInterface,
    BrandRepositoryInterface,
    ProductRepositoryInterface,
    UserRepositoryInterface,
    ClientRepositoryInterface,
    OrderRepositoryInterface,
};

use App\Repositories\{
    AuthRepository, 
    PermissionRepository,
    ProfileRepository,
    PermissionProfileRepository,
    CategoryRepository,
    SubCategoryRepository,
    BrandRepository,
    ProductRepository,
    UserRepository,
    ClientRepository,
    OrderRepository
};

use App\Observers\{
    TenantObserver,
    UserObserver,
    PermissionObserver,
    ProfileObserver,
    CategoryObserver,
    SubCategoryObserver,
    BrandObserver,
    ProductObserver,
    ProductImageObserver,
};

use App\Models\{
    Tenant,
    User,  
    Permission,
    Profile,
    Category,
    SubCategory,
    Brand,
    Product,
    Product_Images,
    Client,
    Order,
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
            SubCategoryRepositoryInterface::class,
            SubCategoryRepository::class,
        );
        $this->app->bind(
            BrandRepositoryInterface::class,
            BrandRepository::class,
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class,
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class,
        );
        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class,
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
        SubCategory::observe(SubCategoryObserver::class);
        Brand::observe(BrandObserver::class);
        Product::observe(ProductObserver::class);
        Product_Images::observe(ProductImageObserver::class);
    }
}

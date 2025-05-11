<?php

namespace Modules\Products\App\Providers;

use Illuminate\Support\ServiceProvider;

use Modules\Products\App\Repositories\ProductsRepositoryInterface;
use Modules\Products\App\Repositories\ProductsReporitory;

class ProductsServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Products';

    protected string $moduleNameLower = 'products';

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepositoryInterface::class, ProductsReporitory::class);
        $this->app->register(RouteServiceProvider::class);
    }
}

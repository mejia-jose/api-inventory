<?php

namespace Modules\Categories\App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Categories\App\Repositories\CategorieRepositoryInterface;
use Modules\Categories\App\Repositories\CategoriesReporitory;

class CategoriesServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Categories';

    protected string $moduleNameLower = 'categories';
    
    /**
     * Register the service provider.
     */
    public function register(): void
    {
         $this->app->bind(CategorieRepositoryInterface::class, CategoriesReporitory::class);
        $this->app->register(RouteServiceProvider::class);
    }
}

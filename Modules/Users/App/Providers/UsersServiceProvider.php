<?php

namespace Modules\Users\App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Users\App\Repositories\UserRepository;
use Modules\Users\App\Repositories\UserRepositoryInterface;

class UsersServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Users';

    protected string $moduleNameLower = 'users';

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->register(RouteServiceProvider::class);
    }
}

<?php

namespace Modules\Users\App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Users\App\Repositories\UserRepository;
use Modules\Users\App\Repositories\UserRepositoryInterface;
use Modules\Users\App\Services\UsersServices;

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
        $this->app->singleton(UsersServices::class, function($app)
        {
          return new UsersServices($app->make(UserRepositoryInterface::class));
        });
        $this->app->register(RouteServiceProvider::class);
    }
}

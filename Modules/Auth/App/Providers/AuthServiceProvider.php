<?php

namespace Modules\Auth\App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Auth';

    protected string $moduleNameLower = 'auth';

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

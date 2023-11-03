<?php

namespace App\Providers;

use App\Interfaces\DebtListRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\DebtListRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            DebtListRepositoryInterface::class,
            DebtListRepository::class,
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

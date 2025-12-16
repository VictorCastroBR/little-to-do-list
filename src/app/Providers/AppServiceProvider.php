<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\TaskRepositoryInterface;
use App\Repositories\CacheTaskRepository;
use App\Repositories\EloquentTaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            TaskRepositoryInterface::class, function ($app) {
                return new CacheTaskRepository(
                    $app->make(EloquentTaskRepository::class)
                );
            }
        );
    }
}

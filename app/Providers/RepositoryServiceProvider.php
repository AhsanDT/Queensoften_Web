<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\AuthRepositoryInterface::class, \App\Repositories\AuthRepository::class);
        $this->app->bind(\App\Repositories\Api\UserApiRepositoryInterface::class, \App\Repositories\Api\UserApiRepository::class);
        $this->app->bind(\App\Repositories\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Repositories\Api\StatsApiRepositoryInterface::class, \App\Repositories\Api\StatsApiRepository::class);
        $this->app->bind(\App\Repositories\Api\ChallengeApiRepositoryInterface::class, \App\Repositories\Api\ChallengeApiRepository::class);
        $this->app->bind(\App\Repositories\Api\StoreApiRepositoryInterface::class, \App\Repositories\Api\StoreApiRepository::class);
        $this->app->bind(\App\Repositories\Api\AchievementApiRepositoryInterface::class, \App\Repositories\Api\AchievementApiRepository::class);
        $this->app->bind(\App\Repositories\Api\SupportApiRepositoryInterface::class, \App\Repositories\Api\SupportApiRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

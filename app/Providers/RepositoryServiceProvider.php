<?php

namespace App\Providers;

use App\Repositories\Api\AuthApiInterface;
use App\Repositories\Api\AuthApiRepository;
use App\Repositories\Api\EstoreApiInterface;
use App\Repositories\Api\EstoreApiRepository;
use App\Repositories\Api\SubscriptionApiInterface;
use App\Repositories\Api\SubscriptionApiRepository;
use App\Repositories\Api\TutorialApiInterface;
use App\Repositories\Api\TutorialApiRepository;
use App\Repositories\Api\WalletApiInterface;
use App\Repositories\Api\WalletApiRepository;
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
        $this->app->bind(AuthApiInterface::class,AuthApiRepository::class);
        $this->app->bind(TutorialApiInterface::class,TutorialApiRepository::class);
        $this->app->bind(EstoreApiInterface::class,EstoreApiRepository::class);
        $this->app->bind(SubscriptionApiInterface::class,SubscriptionApiRepository::class);
        $this->app->bind(WalletApiInterface::class,WalletApiRepository::class);
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

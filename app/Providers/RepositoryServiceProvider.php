<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{
    Ads\AdInterface,
    Ads\AdRepository,
    Favorites\FavoriteInterface,
    Favorites\FavoriteRepository,
    Comments\CommentsInterface,
    Comments\CommentsRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AdInterface::class,
            AdRepository::class
        );

        $this->app->bind(
            FavoriteInterface::class,
            FavoriteRepository::class
        );

        $this->app->bind(
            CommentsInterface::class,
            CommentsRepository::class
        );
    }
}

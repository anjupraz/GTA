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

        $this->app->bind(
            'App\Repositories\Interfaces\ICategoryRepository',
            'App\Repositories\CategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IContactRepository',
            'App\Repositories\ContactRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IEventRepository',
            'App\Repositories\EventRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IGalleryRepository',
            'App\Repositories\GalleryRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IPostRepository',
            'App\Repositories\PostRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IReviewRepository',
            'App\Repositories\ReviewRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\ITeamRepository',
            'App\Repositories\TeamRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IUserRepository',
            'App\Repositories\UserRepository'
        );
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

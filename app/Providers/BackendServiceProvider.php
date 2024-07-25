<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Service\Interfaces\INoticeService',
            'App\Service\NoticeService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IBannerService',
            'App\Service\BannerService'
        );

        $this->app->bind(
            'App\Service\Interfaces\ICategoryService',
            'App\Service\CategoryService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IContactService',
            'App\Service\ContactService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IClientService',
            'App\Service\ClientService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IClientMessageService',
            'App\Service\ClientMessageService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IEventService',
            'App\Service\EventService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IGalleryService',
            'App\Service\GalleryService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IImpactService',
            'App\Service\ImpactService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IPostService',
            'App\Service\PostService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IReviewService',
            'App\Service\ReviewService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IService',
            'App\Service\Service'
        );

        $this->app->bind(
            'App\Service\Interfaces\ITeamService',
            'App\Service\TeamService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IUserService',
            'App\Service\UserService'
        );

        $this->app->bind(
            'App\Service\Interfaces\IVacancyService',
            'App\Service\VacancyService'
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Job;
use App\Comment;
use App\Client;
use App\Site;
use App\Observers\JobObserver;
use App\Observers\CommentObserver;
use App\Observers\ClientObserver;
use App\Observers\SiteObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Job::observe(JobObserver::class);
        Comment::observe(CommentObserver::class);
        Client::observe(ClientObserver::class);
        Site::observe(SiteObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CheckUserRole::class, function(Application $app) {
            return new CheckUserRole(
                $app->make(RoleChecker::class)
            );
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;
use App\Comment;
use App\Client;
use App\Observers\ProjectObserver;
use App\Observers\CommentObserver;
use App\Observers\ClientObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Project::observe(ProjectObserver::class);
        Comment::observe(CommentObserver::class);
        Client::observe(ClientObserver::class);
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

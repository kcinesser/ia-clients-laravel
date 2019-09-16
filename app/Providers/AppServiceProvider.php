<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;
use App\Comment;
use App\Client;
use App\Site;
use App\Observers\ProjectObserver;
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
        Project::observe(ProjectObserver::class);
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
        // generate urls with https by default in production
        if (env('APP_ENV') === 'production') {
            $this->app['url']->forceScheme('https');
        }
        
        $this->app->singleton(CheckUserRole::class, function(Application $app) {
            return new CheckUserRole(
                $app->make(RoleChecker::class)
            );
        });
    }
}

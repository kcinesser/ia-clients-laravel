<?php

namespace App\Providers;

use App\Libraries\Enterprise\EnterpriseClient;
use App\Libraries\GoDaddy\GoDaddyClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * Class LibraryServiceProvider
 *
 * @package App\Providers
 */
class LibraryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GoDaddyClient::class, function ($app) {
            return new GoDaddyClient($app->make(Client::class), config('services.godaddy.api.url'), config('services.godaddy.api.key'), config('services.godaddy.api.secret'));
        });

        $this->app->singleton(EnterpriseClient::class, function($app) {
            return new EnterpriseClient($app->make(Client::class), config('services.enterprise.api.url'), config('services.enterprise.api.key'), config('services.enterprise.api.secret'));
        });
    }
}
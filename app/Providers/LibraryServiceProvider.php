<?php

namespace App\Providers;

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
        
        $this->app->singleton(NamecheapClient::class, function ($app) {
            return new NamecheapClient($app->make(Client::class));
        });
    }
}
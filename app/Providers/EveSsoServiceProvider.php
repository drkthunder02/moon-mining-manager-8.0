<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EveSsoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'eve-sso',
            function ($app) use ($socialite) {
                $config = $app['config']['services.eve-sso'];
                return $socialite->buildProvider(EveSsoSocialiteProvider::class, $config);
            }
        );
    }

    public function register()
    {
        #$this->mergeConfigFrom(__DIR__ . '/../../config/services.php', 'services');
    }
}

<?php

namespace Darkin1\DigestAuth;

use Illuminate\Support\ServiceProvider;

class DigestAuthServiceProvider extends ServiceProvider
{
    const CONFIG_KEY = 'digest-auth';

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->configure(self::CONFIG_KEY);

        $this->app->singleton(DigestAuth::class, function ($app) {
            return new DigestAuth();
        });
    }
}

<?php
namespace Darkin1\DigestAuth;

use Illuminate\Support\ServiceProvider;

class DigestAuthServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DigestAuth::class , function ($app) {
            return new DigestAuth(config('digest-auth'));
        });
    }
}
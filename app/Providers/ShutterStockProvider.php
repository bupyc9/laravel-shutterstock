<?php

namespace App\Providers;

use App\ShutterStock\Client;
use App\ShutterStock\ClientInterface;
use Illuminate\Support\ServiceProvider;

class ShutterStockProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            ClientInterface::class,
            function () {
                return new Client(
                    config('shutterstock.url'),
                    config('shutterstock.consumer.key'),
                    config('shutterstock.consumer.secret')
                );
            }
        );
    }
}

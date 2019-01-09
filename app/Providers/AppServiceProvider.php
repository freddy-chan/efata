<?php

namespace App\Providers;

use App\Twilio\TwilioClient;
use App\Twilio\TwilioClientInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwilioClientInterface::class, TwilioClient::class);
    }
}

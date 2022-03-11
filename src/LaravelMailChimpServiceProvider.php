<?php

namespace Altelma\LaravelMailChimp;

use Illuminate\Support\ServiceProvider;

class LaravelMailChimpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/mailchimp.php' => config_path('mailchimp.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mailchimp.php', 'mailchimp');

        $this->app->singleton(LaravelMailChimp::class, function () {
            $token = config('mailchimp.apiKey');

            return new LaravelMailChimp($token);
        });
    }
}

<?php

namespace LaravelMailChimp;

use Illuminate\Support\ServiceProvider;

class MailChimpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/mailchimp.php' => config_path('mailchimp.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MC', function($app){
            $config = $app['config']['mailchimp'];
            return new MailChimp($config['apikey']);
        });
    }
}

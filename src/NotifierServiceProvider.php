<?php
/**
 * Package of KestyNotifier
 */
namespace Kesty\LaravelNotifier;

/**
 * Class NotifierServiceProvider
 *
 * @package Kesty\LaravelNotifier
 */
class NotifierServiceProvider extends \Illuminate\Support\ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-notifier.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/laravel-notifier'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/laravel-notifier'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../views', 'laravel-notifier');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('kestyNotify', 'Kesty\LaravelNotifier\Notify');

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'laravel-notifier'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}

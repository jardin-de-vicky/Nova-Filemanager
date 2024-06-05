<?php

namespace JardinDeVicky\NovaFileManager;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use JardinDeVicky\NovaFileManager\Http\Middleware\Authorize;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FileManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('nova-file-manager.php'),
        ], 'nova-file-manager-config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-file-manager');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('file-manager-field', __DIR__.'/../dist/js/field.js');
            // Nova::style('file-manager-field', __DIR__.'/../dist/css/field.css');
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->namespace('JardinDeVicky\NovaFileManager\Http\Controllers')
            ->prefix('nova-vendor/jardin-de-vicky/nova-file-manager')
            ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

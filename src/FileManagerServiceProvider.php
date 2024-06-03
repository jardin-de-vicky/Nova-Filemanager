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
            __DIR__.'/../config/config.php' => config_path('filemanager.php'),
        ], 'filemanager-config');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-filemanager');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('filemanager-field', __DIR__.'/../dist/js/field.js');
            // Nova::style('filemanager-field', __DIR__.'/../dist/css/field.css');
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
            ->namespace('JardinDeVicky\Filemanager\Http\Controllers')
            ->prefix('nova-vendor/jardin-de-vicky/nova-filemanager')
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

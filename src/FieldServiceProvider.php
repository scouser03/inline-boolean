<?php

namespace Scouser03\InlineBoolean;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(
            function () {
                $this->routes();
            }
        );
        Nova::serving(function (ServingNova $event) {
            Nova::script('inline-boolean', __DIR__.'/../dist/js/field.js');
            Nova::style('inline-boolean', __DIR__.'/../dist/css/field.css');
        });
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

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }
        Route::middleware(['nova'])
            ->prefix('inline-boolean')
            ->group(__DIR__ . '/../routes/api.php');
    }
}

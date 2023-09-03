<?php

namespace NovaHasManyIndex;

use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-has-many-index', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-has-many-index', __DIR__.'/../dist/css/field.css');
        });
    }
}

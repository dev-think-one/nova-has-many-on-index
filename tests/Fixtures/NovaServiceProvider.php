<?php

namespace NovaHasManyIndex\Tests\Fixtures;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use NovaHasManyIndex\Tests\Fixtures\Nova\Resources\Author;
use NovaHasManyIndex\Tests\Fixtures\Nova\Resources\Post;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }


    protected function dashboards()
    {
        return [
        ];
    }

    protected function resources()
    {
        Nova::resources([
            Author::class,
            Post::class,
        ]);
    }
}

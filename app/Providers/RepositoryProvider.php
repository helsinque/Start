<?php

namespace myProject\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application Services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application Services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \myProject\Repositories\ClientRepository::class,
            \myProject\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \myProject\Repositories\ProjectRepository::class,
            \myProject\Repositories\ProjectRepositoryEloquent::class
        );
    }
}

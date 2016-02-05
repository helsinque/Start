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
        $this->app->bind(
            \myProject\Repositories\ProjectNoteRepository::class,
            \myProject\Repositories\ProjectNoteRepositoryEloquent::class
        );
        $this->app->bind(
            \myProject\Repositories\ProjectTaskRepository::class,
            \myProject\Repositories\ProjectTaskRepositoryEloquent::class
        );
        $this->app->bind(
            \myProject\Repositories\ProjectMemberRepository::class,
            \myProject\Repositories\ProjectMemberRepositoryEloquent::class
        );
    }
}

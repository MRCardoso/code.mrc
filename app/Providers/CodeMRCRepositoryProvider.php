<?php

namespace CodeMRC\Providers;

use Illuminate\Support\ServiceProvider;

class CodeMRCRepositoryProvider extends ServiceProvider
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
            \CodeMRC\Repositories\ClientRepository::class,
            \CodeMRC\Repositories\ClientRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeMRC\Repositories\ProjectRepository::class,
            \CodeMRC\Repositories\ProjectRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeMRC\Repositories\UserRepository::class,
            \CodeMRC\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeMRC\Repositories\ProjectTaskRepository::class,
            \CodeMRC\Repositories\ProjectTaskRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeMRC\Repositories\ProjectMembersRepository::class,
            \CodeMRC\Repositories\ProjectMembersRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeMRC\Repositories\ProjectFileRepository::class,
            \CodeMRC\Repositories\ProjectFileRepositoryEloquent::class
        );
    }
}

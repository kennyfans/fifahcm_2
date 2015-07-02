<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('App\Repositories\UserRepository', 'App\Repositories\UserRepositoryEloquent');
        App::bind('App\Repositories\EventRepository', 'App\Repositories\EventRepositoryEloquent');
    }
}

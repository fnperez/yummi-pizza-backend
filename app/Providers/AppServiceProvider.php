<?php

namespace App\Providers;

use App\Infrastructure\Repositories\EloquentPersistRepository;
use Illuminate\Support\ServiceProvider;
use YummiPizza\Repositories\PersistRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PersistRepository::class, EloquentPersistRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

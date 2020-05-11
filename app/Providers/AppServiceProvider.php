<?php

namespace App\Providers;

use App\Infrastructure\Repositories\EloquentPersistRepository;
use App\Infrastructure\Repositories\EloquentPizzaReadRepository;
use Illuminate\Support\ServiceProvider;
use YummiPizza\Repositories\PersistRepository;
use YummiPizza\Repositories\PizzaRepository;

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
        $this->app->bind(PizzaRepository::class, EloquentPizzaReadRepository::class);
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

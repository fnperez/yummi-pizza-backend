<?php

namespace App\Providers;

use App\Infrastructure\Repositories\EloquentCartReadRepository;
use App\Infrastructure\Repositories\EloquentPersistRepository;
use App\Infrastructure\Repositories\EloquentProductReadRepository;
use Illuminate\Support\ServiceProvider;
use YummiPizza\Repositories\CartRepository;
use YummiPizza\Repositories\PersistRepository;
use YummiPizza\Repositories\ProductRepository;

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
        $this->app->bind(ProductRepository::class, EloquentProductReadRepository::class);
        $this->app->bind(CartRepository::class, EloquentCartReadRepository::class);
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

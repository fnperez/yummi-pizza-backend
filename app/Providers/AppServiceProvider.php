<?php

namespace App\Providers;

use App\Infrastructure\Repositories\Eloquent\EloquentAddressReadRepository;
use App\Infrastructure\Repositories\Eloquent\EloquentCartItemReadRepository;
use App\Infrastructure\Repositories\Eloquent\EloquentCartReadRepository;
use App\Infrastructure\Repositories\Eloquent\EloquentInvoiceReadRepository;
use App\Infrastructure\Repositories\Eloquent\EloquentPersistRepository;
use App\Infrastructure\Repositories\Eloquent\EloquentProductReadRepository;
use Illuminate\Support\ServiceProvider;
use YummiPizza\Repositories\AddressRepository;
use YummiPizza\Repositories\CartItemRepository;
use YummiPizza\Repositories\CartRepository;
use YummiPizza\Repositories\InvoiceRepository;
use YummiPizza\Repositories\PersistRepository;
use YummiPizza\Repositories\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        PersistRepository::class => EloquentPersistRepository::class,
        ProductRepository::class => EloquentProductReadRepository::class,
        CartRepository::class => EloquentCartReadRepository::class,
        CartItemRepository::class => EloquentCartItemReadRepository::class,
        AddressRepository::class => EloquentAddressReadRepository::class,
        InvoiceRepository::class => EloquentInvoiceReadRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
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

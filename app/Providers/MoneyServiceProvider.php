<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Money\Converter;
use Money\Currencies\ISOCurrencies;
use Money\Exchange\FixedExchange;
use YummiPizza\Contracts\IMoneyConverter;

class MoneyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(IMoneyConverter::class, function() {
            $exchange = new FixedExchange(config('currency.exchanges'));

            return new Converter(new ISOCurrencies(), $exchange);
        });
    }
}

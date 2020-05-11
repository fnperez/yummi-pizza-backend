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
        $exchange = new FixedExchange(config('currency.exchanges'));

        $converter = new Converter(new ISOCurrencies(), $exchange);

        $this->app->bind(IMoneyConverter::class, $converter);
    }
}

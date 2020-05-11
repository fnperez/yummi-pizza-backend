<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Money\Converter;
use Money\Currencies\ISOCurrencies;
use Money\Exchange\FixedExchange;
use YummiPizza\Contracts\IDeliveryCalculator;
use YummiPizza\Contracts\IMoneyConverter;
use YummiPizza\Factories\DeliveryCalculatorFactory;
use YummiPizza\Helpers;
use YummiPizza\Utils\FixedDeliveryCalculator;

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

        $this->app->bind(IDeliveryCalculator::class, function () {
            $type = (string) config('delivery.default');
            $config = config("delivery.{$type}");

            return (new DeliveryCalculatorFactory)->make($type, $config);
        });
    }
}

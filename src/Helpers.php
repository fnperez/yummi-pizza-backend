<?php

declare(strict_types=1);

namespace YummiPizza;

use Money\Converter;
use Money\Currency;
use Money\Money;
use YummiPizza\Contracts\IMoneyConverter;

class Helpers
{
    public static function convertCurrency(Money $price, string $currency = 'EUR'): Money
    {
        /** @var Converter $converter */
        $converter = app(IMoneyConverter::class);

        return $converter->convert($price, new Currency(self::parseCurrency($currency)));
    }

    public static function getMoney(string $amount, string $currency = null): Money
    {
        return new Money($amount, new Currency(self::parseCurrency($currency)));
    }

    private static function parseCurrency(string $currency = null): string
    {
        $currency = strtoupper($currency);

        $supported = config('currency.supported');

        !in_array($currency, $supported) && $currency = config('currency.default'); // use default

        return $currency;
    }
}

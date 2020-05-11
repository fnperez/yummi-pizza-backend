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

    public static function formatMoney(Money $money): float
    {
        $amount = $money->getAmount();

        return $amount / 100;
    }

    private static function parseCurrency(string $currency = null): string
    {
        $default = config('currency.default');

        $currency = strtoupper($currency ?? $default);

        $supported = config('currency.currencies');

        !in_array($currency, $supported) && $currency = $default; // use default

        return $currency;
    }

    public static function convertToMoney(float $price)
    {
        $amount = $price * 100;

        return self::getMoney((string) $amount);
    }
}

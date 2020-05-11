<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Currency;
use Money\Money;

interface IMoneyConverter
{
    public function convert(Money $money, Currency $counterCurrency, $roundingMode = Money::ROUND_HALF_UP): Money;
}

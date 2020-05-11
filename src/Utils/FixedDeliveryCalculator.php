<?php

declare(strict_types=1);

namespace YummiPizza\Utils;

use Money\Money;
use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\IDeliveryCalculator;
use YummiPizza\Helpers;

class FixedDeliveryCalculator implements IDeliveryCalculator
{
    protected $fixedAmount;

    public function __construct(float $fixedAmount)
    {
        $this->fixedAmount = $fixedAmount;
    }

    public function calculate(IAddress $address): Money
    {
        return Helpers::getMoney((string) $this->fixedAmount);
    }
}

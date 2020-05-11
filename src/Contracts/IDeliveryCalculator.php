<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;

interface IDeliveryCalculator
{
    public function calculate(IAddress $address): Money;
}

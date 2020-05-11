<?php

declare(strict_types=1);

namespace YummiPizza\Factories;

use YummiPizza\Contracts\IDeliveryCalculator;
use YummiPizza\Exceptions\InvalidDeliveryCalculatorTypeException;
use YummiPizza\Utils\FixedDeliveryCalculator;

class DeliveryCalculatorFactory
{
    public const FIXED = 'fixed';

    public function make(string $type, array $config = []): IDeliveryCalculator
    {
        switch ($type) {
            case self::FIXED:
                return new FixedDeliveryCalculator(...$config);
        }

        throw new InvalidDeliveryCalculatorTypeException($type);
    }
}

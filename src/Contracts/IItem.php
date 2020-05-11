<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;

interface IItem extends IEntity, IHasTimestamps
{
    public function getName(): string;
    public function getPrice(): Money;
    public function getQuantity(): int;

    public function setName(string $name): string;
    public function setPrice(Money $price): Money;
    public function setQuantity(int $quantity): int;
}

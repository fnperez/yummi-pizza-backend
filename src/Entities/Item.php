<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\IItem;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class Item extends Model implements IItem
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;

    public function getId(): string
    {
        // TODO: Implement getId() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function getPrice(): Money
    {
        // TODO: Implement getPrice() method.
    }

    public function getQuantity(): int
    {
        // TODO: Implement getQuantity() method.
    }

    public function setName(string $name): string
    {
        // TODO: Implement setName() method.
    }

    public function setPrice(Money $price): Money
    {
        // TODO: Implement setPrice() method.
    }

    public function setQuantity(int $quantity): int
    {
        // TODO: Implement setQuantity() method.
    }
}

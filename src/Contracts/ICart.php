<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Illuminate\Support\Collection;
use Money\Money;

interface ICart extends IEntity, IHasTimestamps
{
    public function getItems(): Collection;
    public function getTotalPrice(): Money;
    public function hasProduct(IProduct $product): bool;
    public function getCartItem(IProduct $product):? ICartItem;
}

<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

interface ICart extends IEntity, IHasTimestamps
{
    public function getItems(): array;
    public function addItem(ICartItem $item): void;
    public function addBulk(array $items): void;
}

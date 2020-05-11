<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;

interface IProduct extends IEntity, IHasTimestamps
{
    public function getImageUrl(): string;
    public function getName(): string;
    public function getDescription(): string;
    public function getPrice(): Money;
    public function setImageUrl(string $imageUrl): void;
    public function setName(string $name): void;
    public function setDescription(string $description): void;
    public function setPrice(Money $price): void;
}

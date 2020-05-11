<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;

interface IPizza extends IEntity, IHasTimestamps
{
    public function getImageUrl(): string;
    public function getName(): string;
    public function getDescription(): string;
    public function getPrice(): Money;
}

<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\CartItem;

use YummiPizza\Contracts\ICartItem;

interface EditPayload
{
    public function getCartItem(): ICartItem;
    public function getQuantity(): int;
}

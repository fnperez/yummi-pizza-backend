<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\CartItem;

use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IProduct;

interface DeletePayload
{
    public function getCart(): ICart;
    public function getProduct(): IProduct;
}

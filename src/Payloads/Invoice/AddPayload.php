<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Invoice;

use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IUser;

interface AddPayload
{
    public function getCart(): ICart;
    public function getAddress(): IAddress;
    public function getCustomer():? IUser;
}

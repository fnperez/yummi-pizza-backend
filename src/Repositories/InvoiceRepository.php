<?php

declare(strict_types=1);

namespace YummiPizza\Repositories;

use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IInvoice;

interface InvoiceRepository extends ReadRepository
{
    public function findByCart(ICart $cart):? IInvoice;
}

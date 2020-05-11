<?php

declare(strict_types=1);

namespace YummiPizza\Immutables\Invoice;

use YummiPizza\Exceptions\AlreadyPayedInvoiceException;

class PayedStatus extends InvoiceStatus
{
    public function pay(): void
    {
        throw new AlreadyPayedInvoiceException($this->invoice);
    }

    public function id(): string
    {
        return self::PAYED;
    }
}

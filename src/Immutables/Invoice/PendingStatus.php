<?php

declare(strict_types=1);

namespace YummiPizza\Immutables\Invoice;

class PendingStatus extends InvoiceStatus
{
    public function pay(): void
    {
        $this->invoice->setStatus(new PayedStatus($this->invoice));
    }

    public function id(): string
    {
        return self::PENDING;
    }
}

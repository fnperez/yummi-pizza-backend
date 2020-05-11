<?php

declare(strict_types=1);

namespace YummiPizza\Immutables\Invoice;

use YummiPizza\Contracts\IInvoice;

abstract class InvoiceStatus
{
    public const PENDING = 'pending';
    public const PAYED = 'payed';

    /**
     * @var IInvoice
     */
    protected $invoice;

    public function __construct(IInvoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public static function make(string $status, IInvoice $invoice)
    {
        switch ($status) {
            case self::PAYED:
                return new PayedStatus($invoice);
        }

        return new PendingStatus($invoice);
    }

    abstract public function pay(): void;
    abstract public function id(): string;
}

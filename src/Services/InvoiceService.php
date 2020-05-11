<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\IDeliveryCalculator;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Entities\Invoice;
use YummiPizza\Payloads\Invoice\AddPayload;
use YummiPizza\Payloads\Invoice\PayPayload;
use YummiPizza\Repositories\PersistRepository;

class InvoiceService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(AddPayload $payload): IInvoice
    {
        $calculator = app(IDeliveryCalculator::class);

        $invoice = Invoice::make($payload->getCart(), $payload->getAddress(), $calculator);

        $invoice->setCustomer($payload->getCustomer());

        return $this->repository->save($invoice);
    }

    public function pay(PayPayload $payload): void
    {
        $invoice = $payload->getInvoice();

        $invoice->getStatus()->pay();

        $this->repository->save($invoice);
    }
}

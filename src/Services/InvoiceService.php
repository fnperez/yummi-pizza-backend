<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\IDeliveryCalculator;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Entities\Invoice;
use YummiPizza\Exceptions\AlreadyPayedInvoiceException;
use YummiPizza\Exceptions\CartAlreadyUsedException;
use YummiPizza\Immutables\Invoice\InvoiceStatus;
use YummiPizza\Payloads\Invoice\AddPayload;
use YummiPizza\Payloads\Invoice\PayPayload;
use YummiPizza\Repositories\InvoiceRepository;
use YummiPizza\Repositories\PersistRepository;

class InvoiceService
{
    /**
     * @var PersistRepository
     */
    protected $repository;
    /**
     * @var InvoiceRepository
     */
    protected $invoices;

    public function __construct(PersistRepository $repository, InvoiceRepository $invoices)
    {
        $this->repository = $repository;
        $this->invoices = $invoices;
    }

    public function add(AddPayload $payload): IInvoice
    {
        $cart = $payload->getCart();

        $address = $payload->getAddress();

        $calculator = app(IDeliveryCalculator::class);

        $invoice = Invoice::make($cart, $address, $calculator);

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

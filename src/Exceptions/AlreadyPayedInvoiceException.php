<?php

declare(strict_types=1);

namespace YummiPizza\Exceptions;

use Throwable;
use YummiPizza\Contracts\IInvoice;

class AlreadyPayedInvoiceException extends \Exception
{
    /**
     * @var IInvoice
     */
    protected $invoice;

    public function __construct(IInvoice $invoice)
    {
        parent::__construct();

        $this->invoice = $invoice;
    }

    public function render()
    {
        return response()->apiError(400, trans('exceptions.already_payed.message'), trans('exceptions.already_payed.description', [
            'invoice' => $this->invoice->getId()
        ]));
    }

    public function report()
    {
        logger()->error($this->getTraceAsString());
    }
}

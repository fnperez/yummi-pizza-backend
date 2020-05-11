<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Invoice;

use YummiPizza\Contracts\IInvoice;

interface PayPayload
{
    public function getInvoice(): IInvoice;
}

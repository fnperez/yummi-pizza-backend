<?php

declare(strict_types=1);

namespace App\Http\Handlers\Invoice;

use App\Http\Handlers\Handler;
use App\Http\Requests\Invoice\AddRequest;
use App\Http\Resources\InvoiceResource;
use YummiPizza\Services\InvoiceService;

class AddHandler extends Handler
{
    public function __invoke(AddRequest $payload, InvoiceService $service)
    {
        $invoice = $service->add($payload);

        return $this->successResourceResponse(InvoiceResource::make($invoice));
    }
}

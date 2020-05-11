<?php

declare(strict_types=1);

namespace App\Http\Handlers\Invoice;

use App\Http\Handlers\Handler;
use App\Http\Requests\Invoice\PayRequest;
use YummiPizza\Services\InvoiceService;

class PayHandler extends Handler
{
    public function __invoke(PayRequest $request, InvoiceService $service)
    {
        $service->pay($request);

        return $this->successResourceResponse(true);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Handlers\Account;

use App\Http\Handlers\Handler;
use App\Http\Requests\Invoice\BrowseRequest;
use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\InvoiceResource;
use YummiPizza\Repositories\InvoiceRepository;

class BrowseInvoicesHandler extends Handler
{
    public function __invoke(BrowseRequest $request, InvoiceRepository $repository)
    {
        $request->merge([
            'customer_id' => $request->user()->getId(),
        ]);

        $invoices = $repository->browse($request);

        return $this->successCollectionResponse(InvoiceCollection::make($invoices));
    }
}

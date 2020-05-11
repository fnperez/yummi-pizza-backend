<?php

declare(strict_types=1);

namespace App\Http\Resources;

class InvoiceCollection extends PaginatedCollection
{
    public $collects = InvoiceResource::class;
}

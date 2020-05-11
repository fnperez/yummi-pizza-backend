<?php

declare(strict_types=1);

namespace App\Http\Requests\Invoice;

use App\Http\Requests\CriteriaRequest;
use YummiPizza\Repositories\Criteria\Invoice\InvoiceFilter;
use YummiPizza\Repositories\Criteria\Invoice\InvoiceSorting;

class BrowseRequest extends CriteriaRequest
{
    protected function getFilterClass(): string
    {
        return InvoiceFilter::class;
    }

    protected function getSortingClass(): string
    {
        return InvoiceSorting::class;
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use App\Http\Requests\CriteriaRequest;
use YummiPizza\Repositories\Criteria\Pizza\ProductFilter;
use YummiPizza\Repositories\Criteria\Pizza\ProductSorting;

class BrowseRequest extends CriteriaRequest
{
    protected function getFilterClass(): string
    {
        return ProductFilter::class;
    }

    protected function getSortingClass(): string
    {
        return ProductSorting::class;
    }
}

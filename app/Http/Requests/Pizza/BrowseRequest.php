<?php

declare(strict_types=1);

namespace App\Http\Requests\Pizza;

use App\Http\Requests\CriteriaRequest;
use YummiPizza\Repositories\Criteria\Pizza\PizzaFilter;
use YummiPizza\Repositories\Criteria\Pizza\PizzaSorting;

class BrowseRequest extends CriteriaRequest
{
    protected function getFilterClass(): string
    {
        return PizzaFilter::class;
    }

    protected function getSortingClass(): string
    {
        return PizzaSorting::class;
    }
}

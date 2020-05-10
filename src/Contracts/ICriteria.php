<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use YummiPizza\Utils\Filter;
use YummiPizza\Utils\PaginationData;
use YummiPizza\Utils\Sorting;

interface ICriteria
{
    public function getFilter(): Filter;

    public function getSorting(): Sorting;

    public function getPaginationData(): PaginationData;
}

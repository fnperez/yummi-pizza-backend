<?php

declare(strict_types=1);

namespace YummiPizza\Repositories\Criteria\Invoice;

class InvoiceSorting extends \YummiPizza\Utils\Sorting
{
    public const TOTAL_PRICE = 'total_price';
    public const CREATED_AT = 'created_at';

    public function __construct(array $data)
    {
        parent::__construct($data, ['created_at' => 'desc']);
    }
}

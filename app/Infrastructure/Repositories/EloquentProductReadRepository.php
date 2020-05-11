<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use YummiPizza\Contracts\ICriteria;
use YummiPizza\Entities\Product;
use YummiPizza\Repositories\ProductRepository;

class EloquentProductReadRepository extends EloquentReadRepository implements ProductRepository
{
    protected function getEntity(): string
    {
        return Product::class;
    }

    public function browse(ICriteria $criteria)
    {
        return $this->all();
    }
}

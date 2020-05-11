<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use YummiPizza\Contracts\ICriteria;
use YummiPizza\Entities\Cart;
use YummiPizza\Repositories\CartRepository;

class EloquentCartReadRepository extends EloquentReadRepository implements CartRepository
{
    protected function getEntity(): string
    {
        return Cart::class;
    }

    public function browse(ICriteria $criteria)
    {
        return $this->all();
    }
}

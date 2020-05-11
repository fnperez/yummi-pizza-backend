<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Eloquent;

use YummiPizza\Contracts\ICriteria;
use YummiPizza\Entities\CartItem;
use YummiPizza\Repositories\CartItemRepository;

class EloquentCartItemReadRepository extends EloquentReadRepository implements CartItemRepository
{
    protected function getEntity(): string
    {
        return CartItem::class;
    }

    public function browse(ICriteria $criteria)
    {
        return $this->all();
    }
}

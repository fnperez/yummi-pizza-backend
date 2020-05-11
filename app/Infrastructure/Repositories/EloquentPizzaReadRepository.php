<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use YummiPizza\Contracts\ICriteria;
use YummiPizza\Entities\Pizza;

class EloquentPizzaReadRepository extends EloquentReadRepository
{
    protected function getEntity(): string
    {
        return Pizza::class;
    }

    public function browse(ICriteria $criteria)
    {
        return $this->all();
    }
}

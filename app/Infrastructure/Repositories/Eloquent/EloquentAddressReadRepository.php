<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories\Eloquent;

use YummiPizza\Contracts\ICriteria;
use YummiPizza\Entities\Address;
use YummiPizza\Repositories\AddressRepository;

class EloquentAddressReadRepository extends EloquentReadRepository implements AddressRepository
{
    protected function getEntity(): string
    {
        return Address::class;
    }

    public function browse(ICriteria $criteria)
    {
        return $this->all();
    }
}

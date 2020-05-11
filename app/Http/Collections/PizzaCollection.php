<?php

declare(strict_types=1);

namespace App\Http\Collections;

use App\Http\Resources\PizzaResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PizzaCollection extends ResourceCollection
{
    public $collects = PizzaResource::class;
}

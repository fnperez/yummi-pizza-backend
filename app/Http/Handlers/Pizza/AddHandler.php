<?php

declare(strict_types=1);

namespace App\Http\Handlers\Pizza;

use App\Http\Handlers\Handler;
use App\Http\Requests\Pizza\AddRequest;
use App\Http\Resources\PizzaResource;
use YummiPizza\Services\PizzaService;

class AddHandler extends Handler
{
    public function __invoke(AddRequest $request, PizzaService $service)
    {
        $pizza = $service->add($request);

        return $this->successResourceResponse(PizzaResource::make($pizza));
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Handlers\Pizza;

use App\Http\Collections\PizzaCollection;
use App\Http\Handlers\Handler;
use App\Http\Requests\Pizza\BrowseRequest;
use YummiPizza\Repositories\PizzaRepository;

class BrowseHandler extends Handler
{
    public function __invoke(BrowseRequest $request, PizzaRepository $repository)
    {
        $collection = PizzaCollection::make($repository->browse($request));

        return $this->successResourceResponse($collection);
    }
}

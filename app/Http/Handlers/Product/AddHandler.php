<?php

declare(strict_types=1);

namespace App\Http\Handlers\Product;

use App\Http\Handlers\Handler;
use App\Http\Requests\Product\AddRequest;
use App\Http\Resources\ProductResource;
use YummiPizza\Services\ProductService;

class AddHandler extends Handler
{
    public function __invoke(AddRequest $request, ProductService $service)
    {
        $pizza = $service->add($request);

        return $this->successResourceResponse(ProductResource::make($pizza));
    }
}

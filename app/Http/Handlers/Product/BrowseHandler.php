<?php

declare(strict_types=1);

namespace App\Http\Handlers\Product;

use App\Http\Handlers\Handler;
use App\Http\Requests\Product\BrowseRequest;
use App\Http\Resources\ProductResource;
use YummiPizza\Repositories\ProductRepository;

class BrowseHandler extends Handler
{
    public function __invoke(BrowseRequest $request, ProductRepository $repository)
    {
        $collection = ProductResource::collection($repository->browse($request));

        return $this->successResourceResponse($collection);
    }
}

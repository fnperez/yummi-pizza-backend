<?php

declare(strict_types=1);

namespace App\Http\Handlers\Cart;

use App\Http\Handlers\Handler;
use App\Http\Resources\CartResource;
use YummiPizza\Repositories\CartRepository;

class ReadHandler extends Handler
{
    public function __invoke($id, CartRepository $repository)
    {
        $cart = $repository->get($id);

        return $this->successResourceResponse(CartResource::make($cart));
    }
}

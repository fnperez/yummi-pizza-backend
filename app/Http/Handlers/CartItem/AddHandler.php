<?php

declare(strict_types=1);

namespace App\Http\Handlers\CartItem;

use App\Http\Handlers\Handler;
use App\Http\Requests\CartItem\AddRequest;
use App\Http\Resources\CartItemResource;
use YummiPizza\Services\CartItemService;

class AddHandler extends Handler
{
    public function __invoke(AddRequest $request, CartItemService $service)
    {
        $cartItem = $service->add($request);

        return $this->successResourceResponse(CartItemResource::make($cartItem));
    }
}

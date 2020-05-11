<?php

declare(strict_types=1);

namespace App\Http\Handlers\CartItem;

use App\Http\Handlers\Handler;
use App\Http\Requests\CartItem\EditRequest;
use App\Http\Resources\CartItemResource;
use YummiPizza\Services\CartItemService;

class EditHandler extends Handler
{
    public function __invoke(EditRequest $request, CartItemService $service)
    {
        $cartItem = $service->edit($request);

        return $this->successResourceResponse(CartItemResource::make($cartItem));
    }
}

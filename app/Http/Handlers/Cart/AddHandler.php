<?php

declare(strict_types=1);

namespace App\Http\Handlers\Cart;

use App\Http\Handlers\Handler;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use YummiPizza\Services\CartService;

class AddHandler extends Handler
{
    public function __invoke(Request $request, CartService $service)
    {
        $cart = $service->add();

        return $this->successResourceResponse(CartResource::make($cart));
    }
}

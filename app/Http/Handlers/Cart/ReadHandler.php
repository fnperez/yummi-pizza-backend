<?php

declare(strict_types=1);

namespace App\Http\Handlers\Cart;

use App\Http\Handlers\Handler;
use App\Http\Resources\CartResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use YummiPizza\Entities\Cart;
use YummiPizza\Exceptions\CartNotFoundException;
use YummiPizza\Repositories\CartRepository;

class ReadHandler extends Handler
{
    public function __invoke($id, CartRepository $repository)
    {
        /** @var Cart $cart */
        try {
            $cart = $repository->get($id);

            $cart->load(['items']);

            return $this->successResourceResponse(CartResource::make($cart));
        } catch (ModelNotFoundException $ex) {
            throw new CartNotFoundException($ex->getMessage());
        }

    }
}

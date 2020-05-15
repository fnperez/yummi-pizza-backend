<?php

declare(strict_types=1);

namespace App\Http\Handlers\CartItem;

use App\Http\Handlers\Handler;
use App\Http\Requests\CartItem\DeleteRequest;
use YummiPizza\Services\CartItemService;

class DeleteHandler extends Handler
{
    public function __invoke(DeleteRequest $request, CartItemService $service)
    {
        $service->delete($request);
    }
}

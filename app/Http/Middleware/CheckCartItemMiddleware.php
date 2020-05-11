<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use YummiPizza\Exceptions\CartAlreadyUsedException;
use YummiPizza\Immutables\Invoice\InvoiceStatus;
use YummiPizza\Repositories\CartItemRepository;
use YummiPizza\Repositories\CartRepository;
use YummiPizza\Repositories\InvoiceRepository;

class CheckCartItemMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cartItem = app(CartItemRepository::class)->findOne($request->route('id'));

        if ($cartItem) {
            $request->merge([
                'cart_id' => $cartItem->getCart()->getId(),
            ]);

            return app(CheckCartMiddleware::class)->handle($request, $next);
        }

        return $next($request);
    }
}

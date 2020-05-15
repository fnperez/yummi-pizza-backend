<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use YummiPizza\Exceptions\CartAlreadyUsedException;
use YummiPizza\Exceptions\CartNotFoundException;
use YummiPizza\Immutables\Invoice\InvoiceStatus;
use YummiPizza\Repositories\CartRepository;
use YummiPizza\Repositories\InvoiceRepository;

class CheckCartMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cartId = $request->route('cart_id', $request->input('cart_id'));

        if (! $cartId) return $next($request);

        $cart = app(CartRepository::class)->findOne($cartId);

        if ($cart) {
            $invoice = app(InvoiceRepository::class)->findByCart($cart);

            throw_if($invoice && $invoice->isStatus(InvoiceStatus::PAYED), CartAlreadyUsedException::class, $cart, $invoice);

            return $next($request);
        }

        throw_if(! $cart, CartNotFoundException::class, $cartId);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use YummiPizza\Exceptions\CartAlreadyUsedException;
use YummiPizza\Immutables\Invoice\InvoiceStatus;
use YummiPizza\Repositories\CartRepository;
use YummiPizza\Repositories\InvoiceRepository;

class CheckCartMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cart = app(CartRepository::class)->findOne($request->route('cart_id', $request->input('cart_id')));

        if ($cart) {
            $invoice = app(InvoiceRepository::class)->findByCart($cart);

            if ($invoice) {
                throw_if($invoice->isStatus(InvoiceStatus::PAYED), CartAlreadyUsedException::class, $cart, $invoice);
            }
        }

        return $next($request);
    }
}

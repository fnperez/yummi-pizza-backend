<?php

declare(strict_types=1);

namespace YummiPizza\Exceptions;

use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\ErrorCodes;

class CartAlreadyUsedException extends \Exception
{
    /**
     * @var IInvoice
     */
    protected $invoice;
    /**
     * @var ICart
     */
    protected $cart;

    public function __construct(ICart $cart, IInvoice $invoice)
    {
        parent::__construct();

        $this->invoice = $invoice;
        $this->cart = $cart;
    }

    public function render()
    {
        return response()->apiError(400, trans('exceptions.cart_already_used.message'), trans('exceptions.cart_already_used.description', [
            'invoice' => $this->invoice->getId(),
            'cart' => $this->cart->getId(),
        ]), ErrorCodes::CART_ALREADY_USED);
    }

    public function report()
    {
        logger()->error($this->getTraceAsString(), [
            'invoice' => $this->invoice->getId(),
            'cart' => $this->cart->getId(),
        ]);
    }
}

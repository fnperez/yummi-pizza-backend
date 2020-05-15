<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\ICartItem;
use YummiPizza\Entities\CartItem;
use YummiPizza\Payloads\CartItem\AddPayload;
use YummiPizza\Payloads\CartItem\DeletePayload;
use YummiPizza\Payloads\CartItem\EditPayload;
use YummiPizza\Repositories\CartItemRepository;
use YummiPizza\Repositories\PersistRepository;

class CartItemService
{
    /**
     * @var PersistRepository
     */
    protected $repository;
    /**
     * @var CartItemRepository
     */
    private $itemRepository;

    public function __construct(PersistRepository $repository, CartItemRepository $itemRepository)
    {
        $this->repository = $repository;
        $this->itemRepository = $itemRepository;
    }

    public function add(AddPayload $payload): ICartItem
    {
        $cart = $payload->getCart();

        if ($cart->getId() && $cart->hasProduct($payload->getProduct())) {
            $product = $cart->getCartItem($payload->getProduct());

            $product->addQuantity($payload->getQuantity());

            return $this->repository->save($product);
        }

        $item = CartItem::make($payload->getProduct(), $payload->getCart(), $payload->getQuantity());

        return $this->repository->transactional(function() use ($item) {
            $cart = $this->repository->save($item->getCart());

            $item->setCart($cart);

            return $this->repository->save($item);
        });
    }

    public function edit(EditPayload $payload): ICartItem
    {
        $cartItem = $payload->getCartItem();

        $cartItem->setQuantity($payload->getQuantity());

        return $this->repository->save($cartItem);
    }

    public function delete(DeletePayload $payload): void
    {
        $cart = $payload->getCart();
        $product = $payload->getProduct();

        if (! $cart->hasProduct($product)) return; // Nothing to do

        $item = $cart->getCartItem($product);

        $this->repository->remove($item);
    }
}

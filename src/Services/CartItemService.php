<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\ICartItem;
use YummiPizza\Entities\CartItem;
use YummiPizza\Payloads\CartItem\AddPayload;
use YummiPizza\Payloads\CartItem\EditPayload;
use YummiPizza\Repositories\PersistRepository;

class CartItemService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(AddPayload $payload): ICartItem
    {
        $item = CartItem::make($payload->getProduct(), $payload->getCart(), $payload->getQuantity());

        return $this->repository->save($item);
    }

    public function edit(EditPayload $payload): ICartItem
    {
        $cartItem = $payload->getCartItem();

        $cartItem->setQuantity($payload->getQuantity());

        return $this->repository->save($cartItem);
    }
}

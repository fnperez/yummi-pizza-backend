<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\ICartItem;
use YummiPizza\Contracts\IProduct;
use YummiPizza\Helpers;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class CartItem extends Model implements ICartItem
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;
    public $keyType = 'string';

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function getId(): string
    {
        return $this->getKey();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return Helpers::getMoney($this->price);
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getCart(): ICart
    {
        return $this->cart;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(Money $price): void
    {
        $this->price = $price->getAmount();
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setCart(ICart $cart): void
    {
        $this->cart()->associate($cart);
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTotalPrice(): Money
    {
        return $this->getPrice()->multiply($this->getQuantity());
    }

    public static function make(IProduct $product, ICart $cart, int $quantity = 1): ICartItem
    {
        $item = new static;

        $item->setName($product->getName());
        $item->setPrice($product->getPrice());
        $item->setDescription($product->getDescription());
        $item->setQuantity($quantity);
        $item->setCart($cart);

        return $item;
    }
}

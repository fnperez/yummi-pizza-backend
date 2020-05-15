<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Money\Money;
use YummiPizza\Contracts\ICartItem;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IProduct;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class Cart extends Model implements ICart
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;
    public $keyType = 'string';
    
    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return ICartItem[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function getTotalPrice(): Money
    {
        $price = Money::USD(0);

        foreach ($this->getItems() as $item) {
            $price = $price->add($item->getTotalPrice());
        }

        return $price;
    }

    public function hasProduct(IProduct $product): bool
    {
        return $this->getCartItem($product) !== null;
    }

    public function getCartItem(IProduct $product):? ICartItem
    {
        return $this->getItems()->first(function(ICartItem $item) use ($product) {
            return $item->getProduct()->getId() === $product->getId();
        });
    }
}

<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\ICartItem;
use YummiPizza\Contracts\ICart;
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

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return ICartItem[]
     */
    public function getItems(): array
    {
        return $this->items->all();
    }

    public function addItem(ICartItem $item): void
    {
        $this->items->add($item);
    }

    public function addBulk(array $items): void
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public function calculatePrice(): Money
    {
        $price = Money::USD(0);

        foreach ($this->getItems() as $item) {
            $price->add($item->getTotalPrice());
        }

        return $price;
    }
}

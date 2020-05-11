<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Contracts\IItem;
use YummiPizza\Contracts\IUser;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class Invoice extends Model implements IInvoice
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;

    public function getId(): string
    {
        // TODO: Implement getId() method.
    }

    public function getTotalPrice(): Money
    {
        // TODO: Implement getTotalPrice() method.
    }

    public function getDeliveryCost(): Money
    {
        // TODO: Implement getDeliveryCost() method.
    }

    public function getCustomer(): ?IUser
    {
        // TODO: Implement getCustomer() method.
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        // TODO: Implement getItems() method.
    }

    public function getAddress(): IAddress
    {
        // TODO: Implement getAddress() method.
    }

    public function setTotalPrice(Money $totalPrice): void
    {
        // TODO: Implement setTotalPrice() method.
    }

    public function setDeliveryCost(Money $deliveryCost): void
    {
        // TODO: Implement setDeliveryCost() method.
    }

    public function setCustomer(IUser $customer): void
    {
        // TODO: Implement setCustomer() method.
    }

    /**
     * @inheritDoc
     */
    public function setItems(array $items): void
    {
        // TODO: Implement setItems() method.
    }

    public function setAddress(IAddress $address): void
    {
        // TODO: Implement setAddress() method.
    }
}

<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;

interface IInvoice extends IEntity, IHasTimestamps
{
    public function getTotalPrice(): Money;
    public function getDeliveryCost(): Money;
    public function getCustomer():? IUser;
    /** @return IItem[] */
    public function getItems(): array;
    public function getAddress(): IAddress;

    public function setTotalPrice(Money $totalPrice): void;
    public function setDeliveryCost(Money $deliveryCost): void;
    public function setCustomer(IUser $customer): void;
    /** @param  IItem[] $items */
    public function setItems(array $items): void;
    public function setAddress(IAddress $address): void;

}

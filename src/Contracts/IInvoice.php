<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Money\Money;
use YummiPizza\Immutables\Invoice\InvoiceStatus;

interface IInvoice extends IEntity, IHasTimestamps
{
    public function getTotalPrice(): Money;
    public function getSubTotal(): Money;
    public function getDeliveryCost(): Money;
    public function getCustomer():? IUser;
    public function getCart(): ICart;
    public function getAddress(): IAddress;
    public function getStatus(): InvoiceStatus;
    public function isStatus(string $status): bool;

    public function setSubTotal(Money $subTotal): void;
    public function setDeliveryCost(Money $deliveryCost): void;
    public function setCustomer(IUser $customer = null): void;
    public function setAddress(IAddress $address, IDeliveryCalculator $calculator): void;
    public function setCart(ICart $cart): void;
    public function setStatus(InvoiceStatus $status): void;

    public static function make(ICart $cart, IAddress $address, IDeliveryCalculator $calculator): self;
}

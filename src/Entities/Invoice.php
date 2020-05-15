<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IDeliveryCalculator;
use YummiPizza\Contracts\IInvoice;
use YummiPizza\Contracts\ICartItem;
use YummiPizza\Contracts\IUser;
use YummiPizza\Helpers;
use YummiPizza\Immutables\Invoice\InvoiceStatus;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class Invoice extends Model implements IInvoice
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;
    public $keyType = 'string';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function getId(): ?string
    {
        return $this->getKey();
    }

    public function getSubTotal(): Money
    {
        return Helpers::getMoney($this->sub_total);
    }

    public function getDeliveryCost(): Money
    {
        return Helpers::getMoney($this->delivery_cost);
    }

    public function getCustomer(): ?IUser
    {
        return $this->user;
    }

    public function getAddress(): IAddress
    {
        return $this->address;
    }

    public function getCart(): ICart
    {
        return $this->cart;
    }

    public function getTotalPrice(): Money
    {
        return $this->getSubTotal()->add($this->getDeliveryCost());
    }

    public function getStatus(): InvoiceStatus
    {
        return InvoiceStatus::make($this->status, $this);
    }

    public function isStatus(string $status): bool
    {
        return $this->status === $status;
    }

    public function setStatus(InvoiceStatus $status): void
    {
        $this->status = $status->id();
    }

    public function setSubTotal(Money $subTotal): void
    {
        $this->sub_total = $subTotal->getAmount();
    }

    public function setDeliveryCost(Money $deliveryCost): void
    {
        $this->delivery_cost = $deliveryCost->getAmount();
    }

    public function setCustomer(IUser $customer = null): void
    {
        if (! $customer) {
            $this->customer()->dissociate();

            return;
        }

        $this->user()->associate($customer);
    }

    public function setAddress(IAddress $address, IDeliveryCalculator $calculator): void
    {
        $this->address()->associate($address);

        $this->setDeliveryCost($calculator->calculate($address));
    }

    public function setCart(ICart $cart): void
    {
        $this->cart()->associate($cart);

        $this->setSubTotal($cart->getTotalPrice());
    }

    public static function make(ICart $cart, IAddress $address, IDeliveryCalculator $calculator): IInvoice
    {
        $invoice = new static;

        $invoice->setCart($cart);
        $invoice->setAddress($address, $calculator);

        return $invoice;
    }
}

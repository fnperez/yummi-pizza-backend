<?php

declare(strict_types=1);

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Contracts\IAddress;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IUser;
use YummiPizza\Payloads\Invoice\AddPayload;
use YummiPizza\Repositories\AddressRepository;
use YummiPizza\Repositories\CartRepository;

class AddRequest extends FormRequest implements AddPayload
{
    public function rules()
    {
        return [
            'cart_id' => 'required|exists:carts,id',
            'address_id' => 'required|exists:addresses,id'
        ];
    }

    public function getCart(): ICart
    {
        return app(CartRepository::class)->get($this->input('cart_id'));
    }

    public function getAddress(): IAddress
    {
        return app(AddressRepository::class)->get($this->input('address_id'));
    }

    public function getCustomer(): ?IUser
    {
        return $this->user();
    }
}

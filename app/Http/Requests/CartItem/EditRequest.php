<?php

declare(strict_types=1);

namespace App\Http\Requests\CartItem;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Contracts\ICartItem;
use YummiPizza\Payloads\CartItem\EditPayload;
use YummiPizza\Repositories\CartItemRepository;

class EditRequest extends FormRequest implements EditPayload
{
    public function rules()
    {
        return [
            'quantity' => 'required|integer|min:1',
            'cart_item_id' => 'required|exists:cart_items,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cart_item_id' => $this->route('id'),
        ]);
    }

    public function getCartItem(): ICartItem
    {
        return app(CartItemRepository::class)->get($this->input('cart_item_id'));
    }

    public function getQuantity(): int
    {
        return (int) $this->input('quantity', 1);
    }
}

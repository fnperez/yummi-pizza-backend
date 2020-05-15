<?php

declare(strict_types=1);

namespace App\Http\Requests\CartItem;

use Illuminate\Foundation\Http\FormRequest;
use YummiPizza\Contracts\ICart;
use YummiPizza\Contracts\IProduct;
use YummiPizza\Payloads\CartItem\DeletePayload;
use YummiPizza\Repositories\CartRepository;
use YummiPizza\Repositories\ProductRepository;

class DeleteRequest extends FormRequest implements DeletePayload
{
    public function rules()
    {
        return [
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function getCart(): ICart
    {
        return app(CartRepository::class)->get($this->input('cart_id'));
    }

    public function getProduct(): IProduct
    {
        return app(ProductRepository::class)->get($this->input('product_id'));
    }
}

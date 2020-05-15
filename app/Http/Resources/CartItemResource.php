<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'price' => CurrencyResource::make($this->getPrice()),
            'total_price' => CurrencyResource::make($this->getTotalPrice()),
            'product' => ProductResource::make($this->getProduct()),
            'cart' => CartResource::make($this->getCart()),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use YummiPizza\Helpers;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'items' => CartItemResource::collection($this->items),
            'price' => CurrencyResource::make($this->getTotalPrice()),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}

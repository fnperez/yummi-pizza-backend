<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use YummiPizza\Helpers;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        $totalPrice = $this->calculatePrice();

        return [
            'id' => $this->getId(),
            'items' => CartItemResource::collection($this->whenLoaded('items')),
            'price' => CurrencyResource::make($totalPrice),
        ];
    }
}

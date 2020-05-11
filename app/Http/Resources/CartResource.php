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
            'items' => ItemResource::collection($this->whenLoaded('items')),
            'price' => Helpers::formatMoney($totalPrice),
            'currencies' => [
                'usd' => Helpers::formatMoney(Helpers::convertCurrency($totalPrice, 'usd')),
                'eur' => Helpers::formatMoney(Helpers::convertCurrency($totalPrice, 'eur')),
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'sub_total' => CurrencyResource::make($this->getSubTotal()),
            'delivery_cost' => CurrencyResource::make($this->getDeliveryCost()),
            'total_price' => CurrencyResource::make($this->getTotalPrice()),
            'customer' => UserResource::make($this->user),
            'address' => AddressResource::make($this->address),
            'items' => CartItemResource::collection($this->cart->items),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}

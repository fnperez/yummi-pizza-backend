<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use YummiPizza\Contracts\IDeliveryCalculator;

class AddressResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var IDeliveryCalculator $calculator */
        $calculator = app(IDeliveryCalculator::class);

        return [
            'id' => $this->getId(),
            'street_name' => $this->getStreetName(),
            'street_number' => $this->getStreetNumber(),
            'state' => $this->getState(),
            'city' => $this->getCity(),
            'floor' => $this->getFloor(),
            'phone_number' => $this->getPhoneNumber(),
            'delivery_cost' => CurrencyResource::make(($calculator->calculate($this->resource))),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}

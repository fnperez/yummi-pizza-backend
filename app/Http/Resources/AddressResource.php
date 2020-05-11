<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'street_name' => $this->getStreetName(),
            'street_number' => $this->getStreetNumber(),
            'state' => $this->getState(),
            'city' => $this->getCity(),
            'floor' => $this->getFloor(),
            'phone_number' => $this->getPhoneNumber(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
        ];
    }
}

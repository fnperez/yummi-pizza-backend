<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use YummiPizza\Entities\Product;
use YummiPizza\Helpers;

class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->getId(),
            'name'  => $this->getName(),
            'description' => $this->getDescription(),
            'price' => CurrencyResource::make($this->getPrice()),
            'image_url' => $this->getImageUrl(),
            'created_at' => $this->getCreatedAt()->format('Y-m-d'),
            'updated_at' => $this->getUpdatedAt()->format('Y-m-d'),
        ];
    }
}

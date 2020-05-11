<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use YummiPizza\Helpers;

class CurrencyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'usd' => Helpers::formatMoney(Helpers::convertCurrency($this->resource, 'usd')),
            'eur' => Helpers::formatMoney(Helpers::convertCurrency($this->resource, 'eur')),
        ];
    }
}

<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\IPizza;
use YummiPizza\Helpers;
use YummiPizza\Traits\HasTimestamps;

class Pizza extends Model implements IPizza
{
    use HasTimestamps;

    public function getId(): string
    {
        return $this->getKey();
    }

    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): Money
    {
        return Helpers::getMoney($this->price);
    }
}

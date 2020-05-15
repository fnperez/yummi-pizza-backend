<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use Money\Money;
use YummiPizza\Contracts\IProduct;
use YummiPizza\Helpers;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class Product extends Model implements IProduct
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;
    public $keyType = 'string';

    public function getId(): ?string
    {
        return $this->id;
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

    public function setImageUrl(string $imageUrl): void
    {
        $this->image_url = $imageUrl;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(Money $price): void
    {
        $this->price = $price->getAmount();
    }
}

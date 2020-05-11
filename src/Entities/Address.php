<?php

declare(strict_types=1);

namespace YummiPizza\Entities;

use Illuminate\Database\Eloquent\Model;
use YummiPizza\Contracts\IAddress;
use YummiPizza\Traits\HasTimestamps;
use YummiPizza\Traits\UuidGenerator;

class Address extends Model implements IAddress
{
    use HasTimestamps, UuidGenerator;

    public $incrementing = false;

    public function getId(): string
    {
        return $this->id;
    }

    public function getStreetName(): string
    {
        return $this->street_name;
    }

    public function getStreetNumber(): string
    {
        return $this->street_number;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setStreetName(string $streetName): void
    {
        $this->street_name = $streetName;
    }

    public function setStreetNumber(string $streetNumber): void
    {
        $this->street_number = $streetNumber;
    }

    public function setFloor(string $floor): void
    {
        $this->floor = $floor;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phone_number = $phoneNumber;
    }
}

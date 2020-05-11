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

    public function getStreetAddress(): string
    {
        // TODO: Implement getStreetAddress() method.
    }

    public function getZipCode(): string
    {
        // TODO: Implement getZipCode() method.
    }

    public function getHouseNumber(): int
    {
        // TODO: Implement getHouseNumber() method.
    }

    public function getState(): string
    {
        // TODO: Implement getState() method.
    }

    public function getCity(): string
    {
        // TODO: Implement getCity() method.
    }

    public function getPhoneNumber(): string
    {
        // TODO: Implement getPhoneNumber() method.
    }

    public function setStreetAddress(string $streetAddress): void
    {
        // TODO: Implement setStreetAddress() method.
    }

    public function setZipCode(string $zipCode): void
    {
        // TODO: Implement setZipCode() method.
    }

    public function setHouseNumber(int $houseNumber): void
    {
        // TODO: Implement setHouseNumber() method.
    }

    public function setState(string $state): void
    {
        // TODO: Implement setState() method.
    }

    public function setCity(string $city): void
    {
        // TODO: Implement setCity() method.
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        // TODO: Implement setPhoneNumber() method.
    }

    public function getId(): string
    {
        // TODO: Implement getId() method.
    }
}

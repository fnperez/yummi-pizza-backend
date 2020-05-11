<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

interface IAddress extends IEntity, IHasTimestamps
{
    public function getStreetAddress(): string;
    public function getZipCode(): string;
    public function getHouseNumber(): int;
    public function getState(): string;
    public function getCity(): string;
    public function getPhoneNumber(): string;

    public function setStreetAddress(string $streetAddress): void;
    public function setZipCode(string $zipCode): void;
    public function setHouseNumber(int $houseNumber): void;
    public function setState(string $state): void;
    public function setCity(string $city): void;
    public function setPhoneNumber(string $phoneNumber): void;
}

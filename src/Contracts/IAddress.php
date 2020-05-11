<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

interface IAddress extends IEntity, IHasTimestamps
{
    public function getStreetName(): string;
    public function getStreetNumber(): string;
    public function getFloor():? string;
    public function getState(): string;
    public function getCity(): string;
    public function getPhoneNumber(): string;

    public function setStreetName(string $streetName): void;
    public function setStreetNumber(string $streetNumber): void;
    public function setFloor(string $floor): void;
    public function setState(string $state): void;
    public function setCity(string $city): void;
    public function setPhoneNumber(string $phoneNumber): void;
}

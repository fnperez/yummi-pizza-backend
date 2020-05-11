<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Address;

interface AddPayload
{
    public function getStreetName(): string;
    public function getStreetNumber(): string;
    public function getFloor():? string;
    public function getState(): string;
    public function getCity(): string;
    public function getPhoneNumber(): string;
}

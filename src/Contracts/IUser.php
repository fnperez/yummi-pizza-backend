<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Illuminate\Support\Carbon;

interface IUser extends IEntity, IHasTimestamps
{
    public function getName():? string;
    public function getEmail():? string;
    public function getPassword():? string;
    public function getVerifiedAt():? Carbon;
    public function setName(string $name): void;
    public function setEmail(string $email): void;
    public function setPassword(string $password): void;
    public function markEmailAsUnverified(): void;
    public function markEmailAsVerified();
}

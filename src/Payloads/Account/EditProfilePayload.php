<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Account;

use YummiPizza\Contracts\IUser;

interface EditProfilePayload
{
    public function getCurrentUser(): IUser;
    public function getName(): string;
    public function getEmail(): string;
}

<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Account;

use YummiPizza\Contracts\IUser;

interface EditPasswordPayload
{
    public function getCurrentUser(): IUser;
    public function getNewPassword(): string;
}

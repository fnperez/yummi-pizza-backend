<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Account;

interface EditPasswordPayload
{
    public function getLoggedUser();
    public function getNewPassword(): string;
}

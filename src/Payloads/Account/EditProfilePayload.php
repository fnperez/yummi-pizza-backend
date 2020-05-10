<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Account;

interface EditProfilePayload
{
    public function getCurrentUser();
    public function getName(): string;
    public function getEmail(): string;
}

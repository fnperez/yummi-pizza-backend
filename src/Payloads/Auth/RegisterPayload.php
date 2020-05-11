<?php

declare(strict_types=1);

namespace YummiPizza\Payloads\Auth;

interface RegisterPayload
{
    public function getEmail(): string;
    public function getName(): string;
    public function getNewPassword(): string;
}

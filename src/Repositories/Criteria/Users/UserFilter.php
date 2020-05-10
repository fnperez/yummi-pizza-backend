<?php

declare(strict_types=1);

namespace YummiPizza\Repositories\Criteria\Users;

use YummiPizza\Utils\Filter;

class UserFilter extends Filter
{
    public const EMAIL = 'email';
    public const NAME = 'name';
    public const VERIFIED = 'verified';
}

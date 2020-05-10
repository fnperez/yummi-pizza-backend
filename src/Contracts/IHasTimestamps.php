<?php

declare(strict_types=1);

namespace YummiPizza\Contracts;

use Illuminate\Support\Carbon;

interface IHasTimestamps
{
    public function getCreatedAt():? Carbon;
    public function getUpdatedAt():? Carbon;
}

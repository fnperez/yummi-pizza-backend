<?php

declare(strict_types=1);

namespace YummiPizza\Traits;

use Illuminate\Support\Carbon;

trait HasTimestamps
{
    use \Illuminate\Database\Eloquent\Concerns\HasTimestamps;

    public function getCreatedAt():? Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt():? Carbon
    {
        return $this->updated_at;
    }
}

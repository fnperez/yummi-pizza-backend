<?php

declare(strict_types=1);

namespace YummiPizza\Traits;

use Ramsey\Uuid\Uuid;

trait UuidGenerator
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }
}

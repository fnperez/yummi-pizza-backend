<?php

declare(strict_types=1);

namespace YummiPizza\Repositories;

interface PersistRepository
{
    public function save($entity);

    public function remove($entity);

    public function transactional(callable $function);
}

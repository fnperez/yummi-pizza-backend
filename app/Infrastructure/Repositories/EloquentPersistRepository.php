<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use YummiPizza\Repositories\PersistRepository;

class EloquentPersistRepository implements PersistRepository
{
    public function save($entity)
    {
        return $entity->save();
    }

    public function remove($entity)
    {
        return $entity->remove();
    }

    public function transactional(callable $function)
    {
        DB::beginTransaction();

        try {
            $result = $function();

            DB::commit();

            return $result;
        } catch (\Exception $ex) {
            DB::rollBack();

            throw $ex;
        }
    }
}

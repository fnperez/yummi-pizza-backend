<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use YummiPizza\Repositories\PersistRepository;

class EloquentPersistRepository implements PersistRepository
{
    /**
     * @param Model $entity
     * @return bool
     */
    public function save($entity)
    {
        $entity->save();

        return $entity->fresh();
    }

    /**
     * @param Model $entity
     * @return bool|null
     * @throws \Exception
     */
    public function remove($entity)
    {
        return $entity->delete();
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

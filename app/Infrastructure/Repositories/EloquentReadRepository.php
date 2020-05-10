<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;
use YummiPizza\Repositories\ReadRepository;

abstract class EloquentReadRepository implements ReadRepository
{
    public function findOne(string $id)
    {
        return $this->query()->find($id);
    }

    public function get(string $id)
    {
        return $this->query()->findOrFail($id);;
    }

    public function all()
    {
        return $this->query()->all();
    }

    private function query(): Model
    {
        return app($this->getEntity());
    }

    abstract protected function getEntity(): string;
}

<?php

declare(strict_types=1);

namespace YummiPizza\Repositories;

use Illuminate\Database\Eloquent\Model;
use YummiPizza\Contracts\ICriteria;

interface ReadRepository
{
    public function findOne(string $id);
    public function get(string $id);
    public function browse(ICriteria $criteria);
    public function all();
}

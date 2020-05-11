<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\ICart;
use YummiPizza\Entities\Cart;
use YummiPizza\Repositories\PersistRepository;

class CartService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(): ICart
    {
        return $this->repository->save(new Cart);
    }
}

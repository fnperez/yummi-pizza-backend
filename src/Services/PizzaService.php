<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use Ramsey\Uuid\Uuid;
use YummiPizza\Contracts\IPizza;
use YummiPizza\Entities\Pizza;
use YummiPizza\Payloads\Pizza\AddPayload;
use YummiPizza\Repositories\PersistRepository;

class PizzaService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(AddPayload $payload): IPizza
    {
        $folder = config('images.pizza.folder');

        $path = $payload->getImage()->store("public/$folder");

        $filename = pathinfo($path, PATHINFO_BASENAME);

        $pizza = new Pizza;

        $pizza->setName($payload->getName());
        $pizza->setDescription($payload->getDescription());
        $pizza->setPrice($payload->getPrice());
        $pizza->setImageUrl(asset($folder . $filename));

        return $this->repository->save($pizza);
    }
}

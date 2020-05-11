<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\IAddress;
use YummiPizza\Entities\Address;
use YummiPizza\Payloads\Address\AddPayload;
use YummiPizza\Repositories\PersistRepository;

class AddressService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(AddPayload $payload): IAddress
    {
        $address = new Address;

        $address->setStreetName($payload->getStreetName());
        $address->setStreetNumber($payload->getStreetNumber());
        $address->setFloor($payload->getFloor());
        $address->setState($payload->getState());
        $address->setCity($payload->getCity());
        $address->setPhoneNumber($payload->getPhoneNumber());

        return $this->repository->save($address);
    }
}

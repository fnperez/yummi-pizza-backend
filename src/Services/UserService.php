<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Payloads\Account\EditPasswordPayload;
use YummiPizza\Entities\User;
use YummiPizza\Repositories\PersistRepository;

class UserService
{
    /**
     * @var PersistRepository
     */
    protected $repository;

    public function __construct(PersistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function editPassword(EditPasswordPayload $payload)
    {
        /** @var User $user */
        $user = $payload->getLoggedUser();

        $user->setPassword(\Hash::make($payload->getNewPassword()));

        $this->repository->save($user);

        return $user;
    }
}

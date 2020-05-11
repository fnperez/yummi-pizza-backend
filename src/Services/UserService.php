<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use Illuminate\Auth\Events\Registered;
use YummiPizza\Contracts\IUser;
use YummiPizza\Payloads\Account\EditPasswordPayload;
use YummiPizza\Entities\User;
use YummiPizza\Payloads\Account\EditProfilePayload;
use YummiPizza\Payloads\Auth\RegisterPayload;
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

    public function editPassword(EditPasswordPayload $payload): IUser
    {
        $user = $payload->getCurrentUser();

        $user->setPassword(\Hash::make($payload->getNewPassword()));

        return $this->repository->save($user);
    }

    public function editProfile(EditProfilePayload $payload): IUser
    {
        /** @var User $user */
        $user = $payload->getCurrentUser();

        $user->setName($payload->getName());

        $user->setEmail($payload->getEmail());

        $user = $this->repository->save($user);

        // TODO: email verification

        return $user;
    }

    public function register(RegisterPayload $payload): IUser
    {
        $user = new User;
        $user->setEmail($payload->getEmail());
        $user->setName($payload->getName());
        $user->setPassword(\Hash::make($payload->getNewPassword()));

        $user = $this->repository->save($user);

        // TODO: add verification email

        return $user;
    }
}

<?php

declare(strict_types=1);

namespace YummiPizza\Services;

use YummiPizza\Contracts\IUser;
use YummiPizza\Payloads\Account\EditPasswordPayload;
use YummiPizza\Entities\User;
use YummiPizza\Payloads\Account\EditProfilePayload;
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

        $this->repository->save($user);

        return $user;
    }

    public function editProfile(EditProfilePayload $payload): IUser
    {
        /** @var User $user */
        $user = $payload->getCurrentUser();

        $user->setName($payload->getName());

        $mustVerify = $user->getEmail() !== $payload->getEmail();

        $user->setEmail($payload->getEmail());

        $this->repository->save($user);

        if ($mustVerify) {
            $user->markEmailAsUnverified();
            $user->sendEmailVerificationNotification();
        }

        return $user;
    }
}

<?php

namespace App\Http\Handlers\Account;

use App\Http\Handlers\Handler;
use App\Http\Requests\Invoice\EditProfileRequest;
use App\Http\Resources\UserResource as UserResource;
use YummiPizza\Services\UserService;

class EditProfileHandler extends Handler
{
    public function __invoke(EditProfileRequest $request, UserService $service)
    {
        $user = $service->editProfile($request);

        return new UserResource($user);
    }
}

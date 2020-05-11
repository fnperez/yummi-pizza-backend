<?php

declare(strict_types=1);

namespace App\Http\Handlers\Account;

use App\Http\Handlers\Handler;
use App\Http\Requests\Invoice\EditPasswordRequest;
use App\Http\Resources\UserResource;
use YummiPizza\Services\UserService;

class EditPasswordHandler extends Handler
{
    public function __invoke(EditPasswordRequest $request, UserService $users)
    {
        return new UserResource($users->editPassword($request));
    }
}

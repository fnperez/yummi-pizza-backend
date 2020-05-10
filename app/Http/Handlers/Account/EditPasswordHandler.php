<?php

declare(strict_types=1);

namespace App\Http\Handlers\Account;

use App\Http\Handlers\Controller;
use App\Http\Requests\Account\EditPasswordRequest;
use App\Http\Resources\UserResource;
use YummiPizza\Services\UserService;

class EditPasswordHandler extends Controller
{
    public function __invoke(EditPasswordRequest $request, UserService $users)
    {
        return new UserResource($users->editPassword($request));
    }
}

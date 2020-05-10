<?php

namespace App\Http\Handlers\Account;

use App\Http\Handlers\Controller;
use App\Http\Requests\Account\EditProfileRequest;
use App\Http\Resources\UserResource as UserResource;

class EditProfileHandler extends Controller
{
    public function __invoke(EditProfileRequest $request)
    {
        $user = $request->user();

        $user->update($request->only('name', 'email'));

        return new UserResource($user);
    }
}

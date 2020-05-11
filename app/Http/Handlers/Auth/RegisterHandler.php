<?php

namespace App\Http\Handlers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Handlers\Handler;
use App\Http\Resources\UserResource as UserResource;
use YummiPizza\Services\UserService;

class RegisterHandler extends Handler
{
    public function __invoke(RegisterRequest $request, UserService $service)
    {
        $user = $service->register($request);

        Auth::guard()->login($user);

        return $this->successResourceResponse(new UserResource($user));
    }
}

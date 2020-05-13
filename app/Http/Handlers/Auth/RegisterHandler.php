<?php

namespace App\Http\Handlers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Handlers\Handler;
use YummiPizza\Services\UserService;

class RegisterHandler extends Handler
{
    public function __invoke(RegisterRequest $request, UserService $service)
    {
        $user = $service->register($request);

        Auth::guard()->login($user);

        $token = (string) Auth::guard()->getToken();
        $expiration = Auth::guard()->getPayload()->get('exp');

        return $this->successResourceResponse([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
        ]);
    }
}

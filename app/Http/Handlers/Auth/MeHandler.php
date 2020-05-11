<?php

declare(strict_types=1);

namespace App\Http\Handlers\Auth;

use App\Http\Handlers\Handler;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class MeHandler extends Handler
{
    public function __invoke(Request $request)
    {
        return new UserResource($request->user());
    }
}

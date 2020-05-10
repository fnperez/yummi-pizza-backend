<?php

declare(strict_types=1);

namespace App\Http\Handlers\Auth;


use App\Http\Handlers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class MeHandler extends Controller
{
    public function __invoke(Request $request)
    {
        return new UserResource($request->user());
    }
}

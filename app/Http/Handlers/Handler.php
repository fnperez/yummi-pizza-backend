<?php

namespace App\Http\Handlers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseHandler;

class Handler extends BaseHandler
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function successResourceResponse($resource)
    {
        return response()->apiResourceResponse($resource, 200);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Handlers\Address;

use App\Http\Handlers\Handler;
use App\Http\Requests\Address\AddRequest;
use App\Http\Resources\AddressResource;
use YummiPizza\Services\AddressService;

class AddHandler extends Handler
{
    public function __invoke(AddRequest $request, AddressService $service)
    {
        $address = $service->add($request);

        return $this->successResourceResponse(AddressResource::make($address));
    }
}

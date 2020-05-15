<?php

declare(strict_types=1);

namespace YummiPizza\Exceptions;

use YummiPizza\ErrorCodes;

class CartNotFoundException extends \Exception
{
    public function render()
    {
        return response()->apiError(400, trans('exceptions.404.message'), trans('exceptions.404.description'), ErrorCodes::CART_NOT_FOUND);
    }

    public function report()
    {

    }
}

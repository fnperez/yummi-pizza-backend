<?php

declare(strict_types=1);

namespace YummiPizza\Exceptions;

use Throwable;

class InvalidDeliveryCalculatorTypeException extends \Exception
{
    /**
     * @var string
     */
    private $type;

    public function __construct(string $type)
    {
        parent::__construct();

        $this->type = $type;
    }

    public function render()
    {
        return response()->apiError(500, trans('exceptions.invalid_delivery_type.message'), trans('exceptions.invalid_delivery_type.description', [
            'type' => $this->type,
        ]), config('error-codes.invalid-calculator'));
    }

    public function report()
    {
        logger()->error($this->getTraceAsString(), [
            'type' => $this->type,
        ]);
    }
}

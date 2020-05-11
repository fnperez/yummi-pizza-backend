<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        switch (true) {
            case $exception instanceof QueryException:
                return response()->apiError(400, trans('exceptions.400.message'), $exception->getMessage());
            case $exception instanceof ModelNotFoundException:
            case $exception instanceof NotFoundHttpException:
                return response()->apiError(404, trans('exceptions.404.message'), $exception->getMessage());
            case $exception instanceof AccessDeniedHttpException:
                return response()->apiError(403, trans('exceptions.403.message'), trans('exceptions.403.description'));
            case $exception instanceof ValidationException:
                return response()->apiError(422, trans('validation.message'), $exception->errors());
            case $exception instanceof AuthenticationException:
                return response()->apiError(401, trans('exceptions.401.message'), trans('exceptions.401.description'));
        }

        return parent::render($request, $exception);
    }
}

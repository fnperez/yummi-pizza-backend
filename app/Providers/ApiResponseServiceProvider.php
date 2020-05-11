<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        /**
         * @param $status
         * @param $error_code
         * @param $message
         * @param $error_content
         * @return \Illuminate\Http\JsonResponse
         */
        $factory->macro('apiError', function ($status, $message, $content, $internalCode = null) use ($factory) {
            return $factory->json([
                'type' => 'error',
                'status' => $internalCode ?? $status,
                'message' => $message,
                'description' => is_string($content) ? $content : null,
                'errors' => is_array($content) ? $content : null,
            ], $status);
        });

        $factory->macro('apiResourceResponse', function ($data = null, $status = 200) use ($factory) {
            return $factory->json(['data' => $data], $status);
        });

        $factory->macro('apiCollectionResponse', function ($data = null, $status = 200) use ($factory) {
            return $factory->json($data, $status);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

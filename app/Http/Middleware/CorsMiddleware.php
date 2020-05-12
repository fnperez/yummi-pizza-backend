<?php
namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $profile = [
            'allow_credentials' => true,
            'allow_origins' => [
                '*',
            ],
            'allow_methods' => [
                'POST',
                'GET',
                'OPTIONS',
                'PUT',
                'PATCH',
                'DELETE',
            ],
            'allow_headers' => [
                'Content-Type',
                'X-Auth-Token',
                'Origin',
                'Authorization',
            ],
            'expose_headers' => [
                'Cache-Control',
                'Content-Language',
                'Content-Type',
                'Expires',
                'Last-Modified',
                'Pragma',
            ],
        ];

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' => implode(', ', $profile['allow_origins']),
            'Access-Control-Allow-Methods'=> implode(', ', $profile['allow_methods']),
            'Access-Control-Allow-Headers'=> implode(', ', $profile['allow_headers']),
            'Access-Control-Allow-Credentials' => $profile['allow_credentials'],
            'Access-Control-Expose-Headers' => implode(', ', $profile['expose_headers']),
            'Access-Control-Max-Age' => 60 * 60 * 24,
        ];

        $response = $next($request);
        foreach($headers as $key => $value) {
            $response->header($key, $value);
        }

        logger()->debug(json_encode($response->headers->all()));

        return $response;
    }
}
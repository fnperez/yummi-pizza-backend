<?php

namespace App\Http\Middleware;

use Closure;
use App;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->header('Accept-Language');
        App::setLocale($locale);
        return $next($request);
    }
}
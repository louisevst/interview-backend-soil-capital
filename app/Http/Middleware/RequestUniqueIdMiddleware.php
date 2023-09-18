<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//generates a unique identifier for each incoming http req, that can be useful for tracking and debugging requests 

class RequestUniqueIdMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $uuid = (string) Str::uuid();
        $request->headers->set('X-Request-ID', $uuid);

        return $next($request);
    }
}

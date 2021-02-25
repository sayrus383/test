<?php

namespace App\Http\Middleware;

use App\Http\Resources\Api\v1\ErrorResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken() === config('auth.token')) {
            return $next($request);
        }

        return (new ErrorResource('Ошибка токена'))->response()->setStatusCode(403);
    }
}

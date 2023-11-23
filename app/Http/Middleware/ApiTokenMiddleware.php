<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        $api_key = env('API_TOKEN');
        if ($token !== $api_key) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

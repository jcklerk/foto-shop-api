<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class serviceWorker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('token') === config('auth.workers_token')) {
            return $next($request);
        }
        // unauthorized api response
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}

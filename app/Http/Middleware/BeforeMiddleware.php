<?php

namespace App\Http\Middleware;

use Closure;

use Log;

class BeforeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Perform action
        if (!$request->isJson()) {
            return [
                'code' => 1001,
                'error' => 'Missing "Content-Type: application/json" header.',
            ];
        }

        if (!$request->wantsJson()) {
            return [
                'code' => 1001,
                'error' => 'Missing "Accept: application/json" header.',
            ];
        }

        return $next($request);
    }
}

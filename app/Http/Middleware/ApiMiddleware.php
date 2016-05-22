<?php

namespace App\Http\Middleware;

use Closure;

use Log;

class ApiMiddleware
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
        return $next($request);
    }

    public function terminate($request, $response)
    {
        $title = $request->getClientIp()
            .' '.$_SERVER['REQUEST_METHOD']
            .' '.$_SERVER['REQUEST_URI']
            ;
        $log = [];
        $log['status'] = 200;
        $log['content'] = [
            'request' => $request,
            'response' => $response,
        ];

        Log::info($title, $log);

        return '-- api --';
    }
}

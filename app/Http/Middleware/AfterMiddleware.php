<?php

namespace App\Http\Middleware;

use Closure;

class AfterMiddleware
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
        // var_dump($next);
        $response = $next($request);

        // Perform action
        // if (is_object($response)) {
        //     if ($response->original === '') {
        //         $data = null;
        //     } else {
        //         $data = $response->original;
        //     }
        // } else {
        //     $data = $response;
        // }

        // $returns = [
        //     'code' => 1000,
        //     'response' => $data
        // ];
        // $returns = array_filter($returns);

        return [
            'code' => 1000,
            'response' => $response->original,
        ];

        // return response($response, 400);
    }
}

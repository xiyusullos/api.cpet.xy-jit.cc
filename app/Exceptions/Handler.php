<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

use Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        // AuthorizationException::class,
        HttpException::class,
        // ModelNotFoundException::class,
        ValidationException::class,
        \E::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // return parent::render($request, $e);

        if ($e instanceof \E) {
            $response = [
                'code' => $e->getCode(),
                'data' => $e->getExtra(),
                // 'from' => 'Handler',
            ];
        }
        elseif ($e instanceof \App\Errors\ValidationError) {
            $response = [
                'code' => 1001,
                'data' => json_decode($e->getMessage()),
            ];
        }
        elseif ($e instanceof \App\Errors\ApiError) {
            $response = [
                'code' => $e->getCode(),
            ];
        }
        elseif ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $response = [
                'code' => 1002,
                'data' => $e->getMessage(),
            ];
        }

        elseif ($e instanceof \Exception) {
            $response = [
                'code' => 9999,
                'data' => $e->getMessage(),
            ];

            // $title = $request->getClientIp()
            //     .' '.$_SERVER['REQUEST_METHOD']
            //     .' '.$_SERVER['REQUEST_URI']
            //     ;
            // $log = [
            //     'status' => 200,
            //     'content' => $response,
            // ];
            // Log::error($title, $log);
        }

        return (new \Illuminate\Http\Response($response, 200));
        // return response($response, 400);
    }
}

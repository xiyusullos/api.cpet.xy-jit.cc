<?php

class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    // protected $baseUrl = 'http://api.cpet.xy-jit.cc';

    public function apiPost($uri, array $data, array $headers = [])
    {
        $headers = $headers + [
                'Content-Type' => 'application/json;charset=utf-8',
                'Accept' => 'application/json'
            ];
        $server = $this->transformHeadersToServerVars($headers);

        return $this->call('POST', $uri, $data, [], [], $server);
    }


    /**
     * Call the given URI and return the Response.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array   $parameters
     * @param  array   $cookies
     * @param  array   $files
     * @param  array   $server
     * @param  string  $content
     * @return \Illuminate\Http\Response
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $server = $server + [
            'CONTENT_TYPE' => 'application/json;charset=utf-8',
            'HTTP_ACCEPT' => 'application/json',
        ];

        return parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
        // $this->currentUri = $this->prepareUrlForRequest($uri);

        // $request = Request::create(
        //     $this->currentUri, $method, $parameters,
        //     $cookies, $files, $server, $content
        // );

        // return $this->response = $this->app->prepareResponse($this->app->handle($request));
    }
}

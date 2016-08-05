<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class Controller extends BaseController
{
    // protected $fractal;

    public function __construct()
    {
        // $this->fractal = new Manager();
    }


    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return void
     */
    public function validate(\Illuminate\Http\Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = Validator::make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            throw new \App\Errors\ValidationError($validator);
        }
    }

    public function constructData($modelData, $transformer)
    {
        $fractal = new Manager();
        $data = $fractal
            ->createData(new Item($modelData, $transformer))
            ->toArray();

        return $data;
    }

    public function test()
    {
        echo 'test';
    }
}

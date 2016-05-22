<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

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

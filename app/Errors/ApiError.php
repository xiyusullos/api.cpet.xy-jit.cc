<?php

namespace App\Errors;

class ApiError extends \Exception
{
    public function __construct($code)
    {
        parent::__construct('', $code);
    }
}
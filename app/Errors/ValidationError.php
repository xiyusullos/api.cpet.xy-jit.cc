<?php

namespace App\Errors;

class ValidationError extends \Exception
{
    // private $errors = [
    // ];

    // protected $extra;

    public function __construct(\Illuminate\Validation\Validator $validator)
    {
        parent::__construct(strval($validator->errors()));
        // $this->extra = $extra;
    }

    // public function getMsg()
    // {
    //     return isset($this->errors[$this->code]) ? $this->errors[$this->code] : '';
    // }

    // public function getExtra()
    // {
    //     if (is_array($this->extra)) {
    //         return $this->extra;
    //     }
    //     $extra = json_decode($this->extra);
    //     if ($extra) {
    //         return $extra;
    //     }

    //     return $this->extra;
    // }
}
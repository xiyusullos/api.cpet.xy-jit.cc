<?php

namespace App\Transformers;

use App\Models\Sms;
use League\Fractal;

class SmsTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Sms $sms)
    {
        $template = [
            // 'id' => $sms->id,
            // 'phone' => $sms->phone,
            'code' => $sms->code,
            'expiration' => $sms->expiration,
            'token' => $sms->token,
        ];

        return $template;
    }
}
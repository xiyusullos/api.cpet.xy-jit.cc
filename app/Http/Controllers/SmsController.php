<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Errors\ValidationError;
use App\Transformers\SmsTransformer;

use App\Models\Sms;

class SmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 获取短信验证码
    public function getSms(Request $request)
    {
        // $this->validateGetSms($request);
        $rules = [
            'phone' => 'required',
            'sms_reason' => 'required',
        ];
        $this->validate($request, $rules);

        $sms = new Sms();
        $sms->phone = $request->input('phone');
        $sms->code = $this->generateSmsCode();
        $sms->expiration = 120;
        $sms->token = $this->generateSmsToken();
        $sms->save();

        return $this->constructData($sms, new SmsTransformer);
    }

    public function verifySms(Request $request)
    {
        $rules = [
            'sms_code' => 'required',
            'sms_token' => 'required',
        ];
        $this->validate($request, $rules);

        $sms = Sms::where('token', $request->input('sms_token'))
            ->where('code', $request->input('sms_code'))
            ->whereRaw('UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(created_at) < expiration')
            ->firstOrFail();

        return $this->constructData($sms, new SmsTransformer);
    }

    // protected function validateGetSms(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'phone' => 'required',
    //         'sms_reason' => 'required',
    //     ]);
    //     if ($validator->fails()) {
    //         // throw new \E();
    //         throw new ValidationError($validator);
    //     }
    // }

    protected function generateSmsCode($length = 6)
    {
        $start = pow(10, $length - 1);

        return sprintf('%0'.$length.'d', mt_rand($start, 10 * $start - 1));
    }

    protected function generateSmsToken()
    {
        return md5(time() . mt_rand());
    }
}

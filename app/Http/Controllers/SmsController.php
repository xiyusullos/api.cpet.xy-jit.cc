<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Errors\ValidationError;
use App\Errors\ApiError;

use App\Transformers\SmsTransformer;

use App\Models\Sms;
use App\Models\Account;

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

    // 01.获取短信验证码
    public function getSms(Request $request)
    {
        // $this->validateGetSms($request);
        $rules = [
            'phone' => 'required',
            'sms_reason' => 'required|in:1,2',
        ];
        $this->validate($request, $rules);

        if (0 === preg_match('/1[2-9][0-9]{9}/', $request->input('phone'))) {
            // 手机号码格式错误
            throw new ApiError(10101);
        }

        switch ($request->input('sms_reason')) {
            case 1:
                $account = Account::where('username', $request->input('phone'))
                    ->first();
                if ($account !== null) {
                    // 手机号已被使用
                    throw new ApiError(10102);
                }
                break;
            case 2:
                $account = Account::where('username', $request->input('phone'))
                    ->first();
                if ($account === null) {
                    // 手机号未注册
                    throw new ApiError(10103);
                }
                break;
        }

        $sms = new Sms();
        $sms->phone = $request->input('phone');
        $sms->code = $this->generateSmsCode();
        $sms->expiration = 120;
        $sms->token = $this->generateSmsToken();
        $sms->save();

        return $this->constructData($sms, new SmsTransformer);
    }

    // 02.校验短信验证码
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
            ->first();
        if ($sms === null) {
            // 短信验证码错误
            throw new \ApiError(10201);
        }
        return ;
        // $sms->delete();
        //
        // return $this->constructData($sms, new SmsTransformer);
    }

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

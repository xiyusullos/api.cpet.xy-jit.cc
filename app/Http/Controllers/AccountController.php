<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Account;
use App\Models\User;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

use App\Transformers\AccountTransformer;

class AccountController extends Controller
{
    // 01.账户注册
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|phone',
            'password' => 'required',
            'sms_code' => 'required',
            'sms_token' => 'required',
        ];
        $this->validate($request, $rules);

        $account = Account::where('username', $request->input('username'))
            ->first();
        if ($account !== null) {
            // 该账户已注册
            throw new \ApiError(20101);
        }
        $sms = Sms::where('token', $request->input('sms_token'))
            ->where('code', $request->input('sms_code'))
            ->whereRaw('UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(created_at) < expiration')
            ->first();
        if ($sms === null) {
            // 短信验证码错误
            throw new \ApiError(20102);
        }

        DB::beginTransaction();
        $user = new User();
        $user->phone = $request->input('username');
        $user->save();

        $account = new Account();
        $account->user_id = $user->id;
        $account->username = $request->input('username');
        $account->password = $request->input('password');
        // $account->token = md5(time() . mt_rand());
        $account->token = md5($account->id);
        $account->save();
        DB::commit();

        return $this->constructData($account, new AccountTransformer);
    }

    // 02.账户登入
    public function logIn(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $this->validate($request, $rules);

        $account = Account::where('username', $request->input('username'))
            ->where('password', $request->input('password'))
            ->firstOrFail();

        // token处理
        // $account->token = md5(time() . mt_rand());
        $account->token = md5($account->id);
        $account->save();

        return $this->constructData($account, new AccountTransformer);
    }

    // 03.账户登出
    public function logOut(Request $request)
    {
        $rules = [
            'token' => 'required',
        ];
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            throw new \E(1001, $validator->errors());
        }

        $account = Account::where('token', $request->input('token'))
            ->firstOrFail();
        $account->token = null;
        $account->save();

        return ;
    }
}

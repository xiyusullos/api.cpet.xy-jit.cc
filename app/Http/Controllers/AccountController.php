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
    // 注册
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'sms_code' => 'required',
            'sms_token' => 'required',
        ];
        $this->validate($request, $rules);


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

    // 登入
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

    // 登出
    public function logOut(Request $request)
    {
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

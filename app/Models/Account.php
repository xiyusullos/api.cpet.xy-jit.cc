<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Http\Request;

use App\Models\User;

class Account extends Model
{
    use SoftDeletes;

    protected $table = 'account';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public static function C(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->input('username');
    //     $user->save();

    //     $account = new Account();
    //     $account->user_id = $user->id;
    //     $account->username = $request->input('username');
    //     $account->password = $request->input('password');
    //     $account->save();

    //     return $account;
    // }
}
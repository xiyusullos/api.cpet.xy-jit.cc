<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Account;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'user';

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
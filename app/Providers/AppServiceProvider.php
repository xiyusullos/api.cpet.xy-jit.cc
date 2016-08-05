<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

use App\Errors\ApiError;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        Validator::extend('phone',  function($attribute, $value, $parameters) {
            $pattern = '/^1[3-9][0-9]{9}$/';
            if (0 == preg_match($pattern, $value)) {
                // 手机号码格式错误
                throw new ApiError(1009);
            }

            return true;
        });

        Validator::extend('uniquePhone', function($attribute, $value, $parameters) {

            return true;
        });

    }
}

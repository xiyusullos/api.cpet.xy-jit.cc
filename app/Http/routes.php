<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->getRoutes();
    return 'cpet';
    // return $app->version();
});

$app->group([
    'namespace' => 'App\Http\Controllers',
    // 'middleware' => 'After',
], function ($app) {
    // 短信管理：获取短信验证码、校验短信验证码
    $app->post('/sms/getSms', 'SmsController@getSms');
    $app->post('/sms/verifySms', 'SmsController@verifySms');

    // 账户管理：注册、登入、登出
    $app->post('/account/register', 'AccountController@register');
    $app->post('/account/logIn', 'AccountController@logIn');
    $app->post('/account/logOut', 'AccountController@logOut');

    // 设备管理：绑定、解绑、查看佩戴者
    $app->post('/device/bind', 'DeviceController@bind');
    $app->post('/device/unbind', 'DeviceController@unbind');
    $app->post('/device/wearer/view', 'DeviceController@wearerView');

    // 宠物狗管理：排名、运动（计步）、心情（）、心率
    $app->post('/dog/rank', 'DogController@rank');
    $app->post('/dog/pedometer', 'DogController@pedometer');
    $app->post('/dog/mood', 'DogController@mood');
    $app->post('/dog/heartRate', 'DogController@heartRate');
});



// $app->post('/bind', 'ApiController@bind');
// 宠物信息
// $app->post('/pet');

// GPS定位
// 宠物温度
// 心率
// 计步






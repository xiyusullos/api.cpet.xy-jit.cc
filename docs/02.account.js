// 02.账户管理 不需要 token 验证
/**
 * 01.账户注册
 *
 * @apiGroup 02.account
 * @apiName post_account_register
 * @api {post} /account/register 01.账户注册
 * @apiVersion 1.0.0
 *
 * @apiPermission MasterKey
 *
 * @apiParam {String{11}} username 账号，即手机号。
 * @apiParam {String{32}} password 密码
 * @apiParam {String{4..6}} sms_code 短信验证码
 * @apiParam {String{32}} sms_token 短信令牌
 * @apiParamExample {json} 本地注册
 *  POST /account/register
 *  {
 *    "username": "15951700103",
 *    "password": "0CC175B9C0F1B6A831C399E269772661",
 *    "sms_code": "855515",
 *    "sms_token": "388445cf79d08b634c9e2753c0c270e6"
 *  }
 *
 * @apiSuccessExample Sussess-Response
 *  HTTP/1.1 200 OK
 *  {
 *    "code": 1000
 *  }
 *
 * @apiError (/account/register错误码) 1000 云端执行成功
 * @apiError (/account/register错误码) 1001 云端参数无效
 * @apiError (/account/register错误码) 1002 系统忙
 * @apiError (/account/register错误码) 1004 短信验证码错误
 * @apiError (/account/register错误码) 1009 手机号码格式错误
 * @apiError (/account/register错误码) 2003 手机号已被使用
 * @apiError (/account/register错误码) 2005 注册超时，请重试
 */
/**2 * 02.账户登入
 *
 * @apiGroup 02.account
 * @apiName post_account_logIn
 * @api {post} /account/logIn 02.账户登入
 * @apiVersion 1.0.0
 *
 * @apiPermission MasterKey
 *
 * @apiParam {Number=0,1,2} type 登入方式。0-本地显式，1-本地隐式，2-第三方
 * @apiParam {String} [username] 账号。若type=0，此项必填。
 * @apiParam {String} [password] 密码。MD5加密后，大写。若type=0，此项必填。
 * @apiParam {String} [token] 本地token。若type=1，此项必填。
 * @apiParam {Number=0,1,2,3} [third_type] 第三方登录类型。
 *  0-微信，1-QQ，2-微博，3-淘宝。若type=2，此项必填。
 * @apiParam {String} [third_open_id] 第三方open id。若type=2，此项必填。
 * @apiParam {String} [third_token] 第三方token。若type=2，此项必填。
 * @apiParamExample {json} 本地显式
 *  POST /account/logIn
 *  {
 *    "master_key": "11111111111111111111111111111111",
 *    "type": 0,
 *    "username": "15951700103",
 *    "password": "0CC175B9C0F1B6A831C399E269772661",
 *  }
 * @apiParamExample {json} 本地隐式
 *  POST /account/logIn
 *  {
 *    "type": 1,
 *    "token": "d86c828583c5c6160e8acfee88ba1590"
 *  }
 * @apiParamExample {json} 第三方
 *  POST /account/logIn
 *  {
 *    "master_key": "11111111111111111111111111111111",
 *    "type": 2,
 *    "third_type": 0,
 *    "third_open_id": "15951700103",
 *  }
 *
 * @apiSuccess {Number} extra.id 账户ID
 * @apiSuccess {String} extra.username 用户名
 * @apiSuccess {String} extra.token 令牌
 * @apiSuccess {Object} extra.user 用户信息
 * @apiSuccess {String} extra.user.phone 用户手机号码
 * @apiSuccess {String} extra.user.nick_name 用户昵称
 * @apiSuccess {String} extra.user.image 用户头像信息
 * @apiSuccess {String} extra.user.image.id 用户头像ID
 * @apiSuccess {String} extra.user.image.image_url 用户头像地址
 * @apiSuccess {String[]} extra.third_accounts 第三方账号列表
 * @apiSuccess {String} extra.third_accounts.type 第三方账号类型
 * @apiSuccess {String} extra.third_accounts.open_id 第三方账号全局ID
 * @apiSuccess {String} extra.third_accounts.token 第三方账号令牌
 * @apiSuccess {Object} extra.push_user push系统用户信息
 * @apiSuccess {String} extra.push_user.msg_token push系统用户融云token
 * @apiSuccessExample {json} Success-Response
 *  HTTP/1.1 200 OK
 *  {
 *    "code": 1000,
 *    "extra": {
 *      "id": 834440186,
 *      "username": "15951700000",
 *      "token": "57cae5a0d41f546cb490a51844cd39d9",
 *      "user": {
 *        "phone": "15951700000",
 *        "nick_name": "新用户",
 *        "msg": {
 *          "rongcloud": {
 *            "user_id": "user834440186",
 *            "name": "新用户",
 *            "portrait_uri": "1",
 *            "token": "/Z4EFEnP2oO4dYIYw8J6M9rrq5p3kqfe6u6nRSZfrECSU6qQSk+KH7ey85+OZm8/9xohDfII3T3EmgM2/fCit99jsCFQZYr1"
 *          }
 *        },
 *        "image": {
 *          "id": 1,
 *          "image_url": "1"
 *        }
 *      },
 *      "third_accounts": []
 *    }
 *  }
 *
 * @apiError (/account/logIn错误码) 1000 云端执行成功
 * @apiError (/account/logIn错误码) 1001 云端参数无效
 * @apiError (/account/logIn错误码) 1002 系统忙
 * @apiError (/account/logIn错误码) 1009 手机号码格式不正确
 * @apiError (/account/logIn错误码) 2001 token失效，请重新登录
 * @apiError (/account/logIn错误码) 2006 账户或密码错误
 * @apiError (/account/logIn错误码) 2007 账户被锁定
 * @apiError (/account/logIn错误码) 2010 api版本过低
 * @apiErrorExample {json} 2010
 *  HTTP/1.1 200 OK
 *  {
 *    "code": 2010,
 *    "error_msg": "api版本过低"
 *  }
 */
/**2 * 03.忘记密码
 *
 * @apiGroup 02.account
 * @apiName post_account_forgotPassword
 * @api {post} /account/forgotPassword 03.忘记密码
 * @apiVersion 1.0.0
 *
 * @apiPermission MasterKey
 *
 * @apiParam {String{11}} phone 手机号码
 * @apiParam {String{32}} sms_key 短信密钥。
 * @apiParam {String{4..6}} sms_code 短信验证码。有效时间10分钟。
 * @apiParam {String{32}} password 用户新密码。MD5加密后，大写。
 * @apiParamExample Request
 *  POST /account/forgotPassword
 *  {
 *    "master_key": "11111111111111111111111111111111",
 *    "phone": "15951700103",
 *    "sms_key": "6f28df1b9edabbb4fe2c7883bb40bad7",
 *    "sms_code": "832234",
 *    "password": "0CC175B9C0F1B6A831C399E269772661"
 *  }
 *
 * @apiError (/account/forgotPassword错误码) 1001 云端参数无效
 * @apiError (/account/forgotPassword错误码) 1004 短信验证码错误
 * @apiError (/account/forgotPassword错误码) 1004 手机号码格式不正确
 * @apiError (/account/forgotPassword错误码) 2004 手机号未注册
 */
// 02.账户管理 需要 token 验证
/**
 * 04.账户登出
 *
 * @apiGroup 02.account
 * @apiName post_account_logOut
 * @api {post} /account/logOut 04.账户登出
 * @apiVersion 1.0.0
 *
 * @apiPermission AccountToken
 * @apiDefine post_account_logOut
 *
 * @apiParamExample Request
 *  POST /account/logOut
 *  {
 *    "token": "d86c828583c5c6160e8acfee88ba1590"
 *  }
 */
/**2 * 05.查看账户信息
 *
 * @apiGroup 02.account
 * @apiName post_account_view
 * @api {post} /account/view 05.查看账户信息
 * @apiVersion 1.0.0
 *
 * @apiPermission AccountToken
 *
 * @apiParam {Number} id 账户ID
 * @apiParamExample Request
 *  POST /account/view
 *  {
 *    "token": "651e628b88219c6fd97edbec42de70f8",
 *    "id": 1929669645
 *  }
 *
 * @apiSuccess {Number} extra.id 账户ID
 * @apiSuccess {String} extra.username 用户名
 * @apiSuccess {String} extra.token 令牌
 * @apiSuccess {Object} extra.user 用户信息
 * @apiSuccess {String} extra.user.phone 用户手机号码
 * @apiSuccess {String} extra.user.nick_name 用户昵称
 * @apiSuccess {String} extra.user.image 用户头像信息
 * @apiSuccess {String} extra.user.image.id 用户头像ID
 * @apiSuccess {String} extra.user.image.image_url 用户头像地址
 * @apiSuccess {String[]} extra.third_accounts 第三方账号列表
 * @apiSuccess {String} extra.third_accounts.type 第三方账号类型
 * @apiSuccess {String} extra.third_accounts.open_id 第三方账号全局ID
 * @apiSuccess {String} extra.third_accounts.token 第三方账号令牌
 * @apiSuccess {Object} extra.push_user push系统用户信息
 * @apiSuccess {String} extra.push_user.msg_token push系统用户融云token
 * @apiSuccessExample {json} Success-Response
 *  HTTP/1.1 200 OK
 *  {
 *    "code": 1000,
 *    "extra": {
 *      "id": 834440186,
 *      "username": "15951700000",
 *      "token": "57cae5a0d41f546cb490a51844cd39d9",
 *      "user": {
 *        "phone": "15951700000",
 *        "nick_name": "新用户",
 *        "msg": {
 *          "rongcloud": {
 *            "user_id": "user834440186",
 *            "name": "新用户",
 *            "portrait_uri": "1",
 *            "token": "/Z4EFEnP2oO4dYIYw8J6M9rrq5p3kqfe6u6nRSZfrECSU6qQSk+KH7ey85+OZm8/9xohDfII3T3EmgM2/fCit99jsCFQZYr1"
 *          }
 *        },
 *        "image": {
 *          "id": 1,
 *          "image_url": "1"
 *        }
 *      },
 *      "third_accounts": [
 *        {
 *          "type": 0,
 *          "open_id": "15951700103",
 *          "token": null
 *        }
 *      ]
 *    }
 *  }
 *
 * @apiError (/account/view) 1001 云端参数无效
 * @apiError (/account/view) 2001 token失效，请重新登录
 */
/**2 * 06.更新账户信息
 *
 * @apiGroup 02.account
 * @apiName post_account_update
 * @api {post} /account/update 06.更新账户信息
 * @apiVersion 1.0.0
 *
 * @apiPermission AccountToken
 *
 * @apiParam {Number} id 账户ID
 * @apiParam {String{32}} [old_password] 旧密码。MD5加密后，大写。
 *  更新密码时必填。注：token在更新密码时刷新。
 * @apiParam {String{32}} [new_password] 新密码。MD5加密后，大写。
 *  更新密码时必填。注：token在更新密码时刷新。
 * @apiParam {Number} [avatar_id] 头像ID。更新头像时必填。
 * @apiParam {String{1..20}} [nick_name] 昵称。更新昵称时必填。
 * @apiParam {String{32}} [set_password] 设置密码。MD5加密后，大写。
 *  设置密码时必填。
 * @apiParam {String{1..250}} [jpush_id] 推送ID。提交jpush_id时必填。
 * @apiParam {String} [phone] 手机号码。绑定手机号码时必填。
 * @apiParam {String} [sms_key] 短信密钥。绑定手机号码时必填。
 * @apiParam {String} [sms_code] 短信验证码。绑定手机号码时必填。
 * @apiParamExample {json} 更新密码
 *  POST /account/update
 *  {
 *    "token": "9b01902f7df7a3dfeb9f8dadd255b2a1",
 *    "id": 2042429599,
 *    "old_password": "0CC175B9C0F1B6A831C399E269772661",
 *    "new_password": "0CC175B9C0F1B6A831C399E269772661"
 *  }
 * @apiParamExample {json} 更新头像
 * Request:
 *  POST /account/update
 *  {
 *    "token": "9ac004d8aee0fe27b8c07f6710135ba8",
 *    "id": 2042429599,
 *    "avatar_id": 1
 *  }
 * @apiParamExample {json} 绑定手机号码，或更换手机号码
 * Request:
 *  POST /account/update
 *  {
 *    "token": "d86c828583c5c6160e8acfee88ba1590",
 *    "id": 2042429599,
 *    "phone": "15951700103",
 *    "sms_key": "388445cf79d08b634c9e2753c0c270e6",
 *    "sms_code": "153657"
 *  }
 * @apiParamExample {json} 设置密码
 * Request:
 *  POST /account/update
 *  {
 *    "token": "d86c828583c5c6160e8acfee88ba1590",
 *    "id": 2042429599,
 *    "set_password": "0CC175B9C0F1B6A831C399E269772661"
 *  }
 * @apiParamExample {json} 更新昵称
 * Request:
 *  POST /account/update
 *  {
 *    "token": "9ac004d8aee0fe27b8c07f6710135ba8",
 *    "id": 2042429599,
 *    "nick_name": "小拉拉"
 *  }
 *
 *
 * @apiSuccess {Number} extra.id 账户ID
 * @apiSuccess {String} extra.username 用户名
 * @apiSuccess {String} extra.token 令牌
 * @apiSuccess {Object} extra.user 用户信息
 * @apiSuccess {String} extra.user.phone 用户手机号码
 * @apiSuccess {String} extra.user.nick_name 用户昵称
 * @apiSuccess {String} extra.user.image 用户头像信息
 * @apiSuccess {String} extra.user.image.id 用户头像ID
 * @apiSuccess {String} extra.user.image.image_url 用户头像地址
 * @apiSuccess {String[]} extra.third_accounts 第三方账号列表
 * @apiSuccess {String} extra.third_accounts.type 第三方账号类型
 * @apiSuccess {String} extra.third_accounts.open_id 第三方账号全局ID
 * @apiSuccess {String} extra.third_accounts.token 第三方账号令牌
 * @apiSuccess {Object} extra.push_user push系统用户信息
 * @apiSuccess {String} extra.push_user.msg_token push系统用户融云token
 * @apiSuccessExample {json} Success-Response
 *  HTTP/1.1 200 OK
 *  {
 *    "code": 1000,
 *    "extra": {
 *      "id": 1866548012,
 *      "username": "06a7d9ee29bf70bb68b2de01e4971ad75",
 *      "token": "73b9ea7f1c90b711850ace21499fee0f",
 *      "user": {
 *        "phone": null,
 *        "nick_name": "opss",
 *        "msg": {
 *          "rongcloud": {
 *            "user_id": "user834440186",
 *            "name": "新用户",
 *            "portrait_uri": "1",
 *            "token": "/Z4EFEnP2oO4dYIYw8J6M9rrq5p3kqfe6u6nRSZfrECSU6qQSk+KH7ey85+OZm8/9xohDfII3T3EmgM2/fCit99jsCFQZYr1"
 *          }
 *        },
 *        "image": {
 *          "id": 1,
 *          "image_url": "http://viroaylnanjing20151103.oss-cn-shanghai.aliyuncs.com/iyuyun/images/32615a46f92518908f3f938925c8846c"
 *        }
 *      },
 *      "third_accounts": [
 *        {
 *          "type": 0,
 *          "open_id": "15951700103",
 *          "token": null
 *        }
 *      ]
 *    }
 *  }
 *
 * @apiError (/account/forgotPassword) 1001 云端参数无效
 * @apiError (/account/forgotPassword) 1004 短信验证码错误
 * @apiError (/account/forgotPassword) 1004 手机号码格式不正确
 * @apiError (/account/forgotPassword) 2001 token失效，请重新登录
 * @apiError (/account/forgotPassword) 2003 手机号已被使用
 * @apiError (/account/forgotPassword) 2009 旧密码输入有误
 */
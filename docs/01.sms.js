/**
 * 01.获取短信验证码
 *
 * @apiGroup 01.sms
 * @apiName post_sms_getSms
 * @api {post} /sms/getSms 01.获取短信验证码
 * @apiVersion 1.0.0
 *
 * @apiParam {String} phone 手机号码。接收短信验证码的手机号码。
 * @apiParam {Number=1,2} sms_reason 发送原因。
 *  1-注册；2-忘记密码；
 * @apiParamExample {json} Request
 *  POST /sms/getSms
 *  {
 *    "phone": "15951700103",
 *    "sms_reason": 1
 *  }
 *
 * @apiSuccess {Number} data.expiration 验证码密钥
 * @apiSuccess {String} data.token 验证码令牌
 * @apiSuccessExample {json} Success-Response
 *  HTTP/1.1 200 OK
 *  {
 *    "code": 1000,
 *    "data": {
 *      "expiration": 120,
 *      "token": "cdfb3ed44436497e4232a366e58c4ce6",
 *    }
 *  }
 *
 * @apiError (/sms/getSms错误码) 1000 云端执行成功
 * @apiError (/sms/getSms错误码) 1001 云端参数无效
 * @apiError (/sms/getSms错误码) 1002 系统忙
 * @apiError (/sms/getSms错误码) 10101 手机号码格式错误
 * @apiError (/sms/getSms错误码) 10102 手机号已被使用
 * @apiError (/sms/getSms错误码) 10103 手机号未注册
*/


/**
 * 02.校验短信验证码
 *
 * @apiGroup 01.sms
 * @apiName post_sms_verifySms
 * @api {post} /sms/verifySms 02.校验短信验证码
 * @apiVersion 1.0.0
 *
 * @apiParam {String{4..6}} sms_code 短信验证码
 * @apiParam {String{32}} sms_token 验证码令牌
 * @apiParamExample Request
 *  POST /sms/verifySms
 *  {
 *    "sms_code": "489761",
 *    "sms_token": "cdfb3ed44436497e4232a366e58c4ce6"
 *  }
 *
 * @apiError (/sms/verifySms错误码) 1000 云端执行成功
 * @apiError (/sms/verifySms错误码) 1001 云端参数无效
 * @apiError (/sms/verifySms错误码) 1002 系统忙
 * @apiError (/sms/verifySms错误码) 10201 短信验证码错误
*/

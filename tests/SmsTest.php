<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

use GuzzleHttp\Client;

class SmsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetSms()
    {
        $api_data_item = [
            "group" => "01_sms",
            "name" => "post_sms_getSms",
            "type" => "post",
            "url" => "/sms/getSms",
            "title" => "01.获取短信验证码",
            "version" => "1.0.0",
            "parameter": [
                "fields": [
                    "Parameter": [
                        [
                            "group" => "Parameter",
                            "type" => "String",
                            "optional": false,
                            "field" => "phone",
                            "description" => "<p>手机号码。接收短信验证码的手机号码。</p>"
                        ],
                        [
                            "group" => "Parameter",
                            "type" => "Number",
                            "allowedValues": [
                                "1",
                                "2"
                            ],
                            "optional": false,
                            "field" => "sms_reason",
                            "description" => "<p>发送原因。 1-注册；2-忘记密码；</p>"
                        ]
                    ]
                ],
                "examples": [
                    [
                        "title" => "Request",
                        "content" => "POST /sms/getSms\n{\n  \"phone\": \"15951700103\",\n  \"sms_reason\": 1\n]",
                        "type" => "json"
                    ]
                ]
            ],
            "success": [
                "fields": [
                    "Success 200": [
                        [
                            "group" => "Success 200",
                            "type" => "Number",
                            "optional": false,
                            "field" => "extra.expiration",
                            "description" => "<p>验证码密钥</p>"
                        ],
                        [
                            "group" => "Success 200",
                            "type" => "String",
                            "optional": false,
                            "field" => "extra.key",
                            "description" => "<p>验证码密钥</p>"
                        ]
                    ]
                },
                "examples": [
                    [
                        "title" => "Success-Response",
                        "content" => "HTTP/1.1 200 OK\n{\n  \"error_code\": 1000,\n  \"extra\": {\n    \"expiration\": 120,\n    \"key\": \"cdfb3ed44436497e4232a366e58c4ce6\",\n  }\n}",
                        "type" => "json"
                    ]
                ]
            ],
            "error": [
                "fields": [
                    "/sms/getSms错误码": [
                        [
                            "group" => "/sms/getSms错误码",
                            "optional": false,
                            "field" => "1000",
                            "description" => "<p>云端执行成功</p>"
                        ],
                        [
                            "group" => "/sms/getSms错误码",
                            "optional": false,
                            "field" => "1001",
                            "description" => "<p>云端参数无效</p>"
                        ],
                        [
                            "group" => "/sms/getSms错误码",
                            "optional": false,
                            "field" => "1002",
                            "description" => "<p>系统忙</p>"
                        ],
                        [
                            "group" => "/sms/getSms错误码",
                            "optional": false,
                            "field" => "1009",
                            "description" => "<p>手机号码格式错误</p>"
                        ],
                        [
                            "group" => "/sms/getSms错误码",
                            "optional": false,
                            "field" => "2003",
                            "description" => "<p>手机号已被使用</p>"
                        ],
                        {
                            "group" => "/sms/getSms错误码",
                            "optional": false,
                            "field" => "2004",
                            "description" => "<p>手机号未注册</p>"
                        ]
                    ]
                ]
            ],
            "filename" => "app/01.sms.js",
            "groupTitle" => "01_sms"
        ];


        $base_uri = 'http://api.cpet.xy-jit.cc';
        $guzzle = new Client(['base_uri' => $base_uri]);
        // $guzzle->
        $headers = [
            'Content-Type' => 'application/json;charset=utf-8',
            'Accept' => 'application/json',
        ];
        $route = '/sms/getSms';
        $params = [
            'phone' => '15951700103',
            'sms_reason' => 1,
        ];
        $body = json_encode($params);
        $request = new \GuzzleHttp\Psr7\Request('post', $base_uri.$route, $headers, $body);

        $data = $guzzle->send($request);

        // echo 'test post /sms/getSms'.PHP_EOL;
        // $params = [
        //     'phone' => '15951700103',
        //     'sms_reason' => 1,
        // ];
        // $this->post('/sms/getSms', $params);

        // echo ( $this->response);
        //
        /**
         *
         *
         */


        $no = '01';
        $method = 'post';
        $uri = '/sms/getSms';
        $title = '获取短信验证码';

        $apiGroup = "{$no}.sms";
        $apiName = 'post_sms_getSms';
        $api = "{$method} {$uri} {$title}";
        $apiVersion = '1.0.0';

        $apiParams = [];
        foreach ($params as $key => $value) {
            $apiParams[] = '{'.gettype($value)."} {$key} 描述";
        }
        $apiParamExample = '';
        $apiSuccesses = [];
        $apiSuccessExample = '';
        $apiErrors = [];

        $doc = '';
        $doc .= '/**'.PHP_EOL;
        $doc .= " * {$no}.{$title}".PHP_EOL;
        $doc .= " * @apiGroup {$apiGroup}".PHP_EOL;
        $doc .= " * @apiName {$apiName}".PHP_EOL;
        $doc .= " * @api {$api}".PHP_EOL;
        $doc .= " * @apiVersion {$apiVersion}".PHP_EOL;
        $doc .= " *".PHP_EOL;
        foreach ($apiParams as $apiParam) {
            $doc .= " * @apiParam {$apiParam}".PHP_EOL;
        }
        $doc .= " * @apiParamExample {$apiParamExample}".PHP_EOL;

        // json_encode(json_decode($data->getBody()), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

        file_put_contents('file.js', $doc);
    }


}

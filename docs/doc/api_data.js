define({ "api": [
  {
    "group": "01_sms",
    "name": "post_sms_getSms",
    "type": "post",
    "url": "/sms/getSms",
    "title": "01.获取短信验证码",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号码。接收短信验证码的手机号码。</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "allowedValues": [
              "1",
              "2"
            ],
            "optional": false,
            "field": "sms_reason",
            "description": "<p>发送原因。 1-注册；2-忘记密码；</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request",
          "content": "POST /sms/getSms\n{\n  \"phone\": \"15951700103\",\n  \"sms_reason\": 1\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "extra.expiration",
            "description": "<p>验证码密钥</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "extra.key",
            "description": "<p>验证码密钥</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response",
          "content": "HTTP/1.1 200 OK\n{\n  \"error_code\": 1000,\n  \"extra\": {\n    \"expiration\": 120,\n    \"key\": \"cdfb3ed44436497e4232a366e58c4ce6\",\n  }\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "/sms/getSms错误码": [
          {
            "group": "/sms/getSms错误码",
            "optional": false,
            "field": "1000",
            "description": "<p>云端执行成功</p>"
          },
          {
            "group": "/sms/getSms错误码",
            "optional": false,
            "field": "1001",
            "description": "<p>云端参数无效</p>"
          },
          {
            "group": "/sms/getSms错误码",
            "optional": false,
            "field": "1002",
            "description": "<p>系统忙</p>"
          },
          {
            "group": "/sms/getSms错误码",
            "optional": false,
            "field": "1009",
            "description": "<p>手机号码格式错误</p>"
          },
          {
            "group": "/sms/getSms错误码",
            "optional": false,
            "field": "2003",
            "description": "<p>手机号已被使用</p>"
          },
          {
            "group": "/sms/getSms错误码",
            "optional": false,
            "field": "2004",
            "description": "<p>手机号未注册</p>"
          }
        ]
      }
    },
    "filename": "app/01.sms.js",
    "groupTitle": "01_sms"
  },
  {
    "group": "01_sms",
    "name": "post_sms_verifySms",
    "type": "post",
    "url": "/sms/verifySms",
    "title": "02.校验短信验证码",
    "version": "1.0.0",
    "permission": [
      {
        "name": "MasterKey"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "size": "32",
            "optional": false,
            "field": "sms_key",
            "description": "<p>验证码密钥</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号码。接收短信验证码的手机号码。</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "size": "4..6",
            "optional": false,
            "field": "sms_code",
            "description": "<p>短信验证码</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request",
          "content": "POST /sms/verifySms\n{\n  \"master_key\": \"11111111111111111111111111111111\",\n  \"sms_key\": \"cdfb3ed44436497e4232a366e58c4ce6\",\n  \"phone\": \"15951700103\",\n  \"sms_code\": \"489761\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "/sms/verifySms错误码": [
          {
            "group": "/sms/verifySms错误码",
            "optional": false,
            "field": "1000",
            "description": "<p>云端执行成功</p>"
          },
          {
            "group": "/sms/verifySms错误码",
            "optional": false,
            "field": "1001",
            "description": "<p>云端参数无效</p>"
          },
          {
            "group": "/sms/verifySms错误码",
            "optional": false,
            "field": "1002",
            "description": "<p>系统忙</p>"
          },
          {
            "group": "/sms/verifySms错误码",
            "optional": false,
            "field": "1004",
            "description": "<p>短信验证码错误</p>"
          },
          {
            "group": "/sms/verifySms错误码",
            "optional": false,
            "field": "1009",
            "description": "<p>手机号码格式错误</p>"
          }
        ]
      }
    },
    "filename": "app/01.sms.js",
    "groupTitle": "01_sms"
  }
] });

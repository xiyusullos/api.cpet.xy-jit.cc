define({
  "name": "优和萌宠APIs文档",
  "version": "1.0.0",
  "description": "本文档供APP端查看，安卓开发人员参考。",
  "title": "优和萌宠APIs",
  "url": "http://api.cpet.xy-jit.cc",
  "template": {
    "forceLanguage": "zh-cn",
    "withCompare": true,
    "withGenerator": false
  },
  "header": {
    "title": "API数据格式约定",
    "content": "<h1>API数据格式约定</h1>\n<ul>\n<li>数据传输采用JSON格式</li>\n</ul>\n<h2>Request</h2>\n<ul>\n<li>所有请求必须带上 &quot;Content-Type&quot;: &quot;application/json;charset=utf-8&quot; 请求头，特殊情况除外（如“图片上传”），否则视为错误请求。</li>\n<li>所有请求必须带上 &quot;Accept&quot;: &quot;application/json&quot; 请求头，特殊情况除外（如“图片上传”），否则视为错误请求。</li>\n<li>所有请求在没有带上 token 时，必须带上 master_key 。下不赘述。</li>\n</ul>\n<h2>Response</h2>\n<table>\n    <thead>\n        <tr>\n            <th style=\"width: 30%\">参数名称</th>\n            <th style=\"width: 10%\">参数类型</th>\n            <th style=\"width: 70%\">参数解释</th>\n        </tr>\n    </thead>\n    <tbody>\n        <tr>\n            <td>code</td>\n            <td>Number</td>\n            <td>错误代码</td>\n        </tr>\n        <tr>\n            <td>data</td>\n            <td>Object</td>\n            <td>响应信息</td>\n        </tr>\n    </tbody>\n</table>\n<h3>当&quot;code&quot;为1000时，&quot;data&quot;的结构请参考下面具体的接口响应说明</h3>\n"
  },
  "footer": {
    "title": "错误代码说明",
    "content": "<h2>错误代码说明</h2>\n<table>\n<thead>\n<tr>\n<th>code(错误代码)</th>\n<th>代码说明</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td>1000</td>\n<td>成功</td>\n</tr>\n<tr>\n<td>1001</td>\n<td>参数无效</td>\n</tr>\n<tr>\n<td>1002</td>\n<td>系统忙</td>\n</tr>\n</tbody>\n</table>\n"
  },
  "order": [
    "post_apis",
    "post_sms_getSms",
    "post_sms_verifySms",
    "post_account_register",
    "post_account_logIn",
    "post_account_forgotPassword",
    "post_account_logOut",
    "post_account_view",
    "post_account_update",
    "post_device_models",
    "post_device_bind_query",
    "post_device_bind",
    "post_device_bind_verify",
    "post_device_bind_confirm",
    "post_device_unbind",
    "post_device_share",
    "post_device_bindList",
    "post_qrcode_generate",
    "post_qrcode_check"
  ],
  "sampleUrl": false,
  "apidoc": "0.2.0",
  "generator": {
    "name": "apidoc",
    "time": "2016-05-22T13:36:20.173Z",
    "url": "http://apidocjs.com",
    "version": "0.14.0"
  }
});

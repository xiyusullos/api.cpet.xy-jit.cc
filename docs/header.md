# API数据格式约定

* 数据传输采用JSON格式

## Request
* 所有请求必须带上 "Content-Type": "application/json;charset=utf-8" 请求头，特殊情况除外（如“图片上传”），否则视为错误请求。
* 所有请求必须带上 "Accept": "application/json" 请求头，特殊情况除外（如“图片上传”），否则视为错误请求。
* 所有请求在没有带上 token 时，必须带上 master_key 。下不赘述。

## Response
<table>
    <thead>
        <tr>
            <th style="width: 30%">参数名称</th>
            <th style="width: 10%">参数类型</th>
            <th style="width: 70%">参数解释</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>code</td>
            <td>Number</td>
            <td>错误代码</td>
        </tr>
        <tr>
            <td>data</td>
            <td>Object</td>
            <td>响应信息</td>
        </tr>
    </tbody>
</table>


###  当"code"为1000时，"data"的结构请参考下面具体的接口响应说明

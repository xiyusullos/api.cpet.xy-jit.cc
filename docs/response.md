# API数据格式约定

* 数据传输采用JSON格式

## Request
* 所有请求必须带上 "Content-Type": "application/json;charset=utf-8" 请求头，
	否则视为错误请求。

## Response
<table>
	<thead>
		<tr>
			<th style="width: 30%">字段</th>
			<th style="width: 10%">类型</th>
			<th style="width: 70%">描述</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>error_code</td>
			<td>Number</td>
			<td>错误代码</td>
		</tr>
		<tr>
			<td>error_msg</td>
			<td>String</td>
			<td>错误消息</td>
		</tr>
		<tr>
			<td>extra</td>
			<td>Object</td>
			<td>附加响应信息</td>
		</tr>
	</tbody>
</table>


###  当"error_code"为1000时，"extra"的结构具体见下面的说明

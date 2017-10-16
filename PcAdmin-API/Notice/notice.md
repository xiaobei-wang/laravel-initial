# 通知管理

## 说明

获取通知列表

### url路径

`/api/notice/index`

### 获取方式

`GET`

### 请求参数

|字段名|类型|必选|说明|
|:--|:--|:--|:--|
| id |int|  true |通知id|

## 返回结果


~~~JavaScript
{
 "items": [
     {
         "id": 1,
         "from": "123",
         "title": "标题",
         "content": "内容",
         "link": "链接",
         "created_at": "2017-09-27 04:52:17",
         "updated_at": "2017-10-16 11:47:52"
     }
 ]
}
~~~

## 返回字段说明

|字段名|类型|说明|
|:--|:--|:--|
| items | JSONObject |产品列表|
| count | int |数量|
| appends | JSONObject |筛选条件|

## list字段说明

|字段名|类型|说明|
|:--|:--|:--|
|id|int|id标识|
|from|string|发送者|
|title|string|标题|
|content|string|内容|
|link|string|链接|

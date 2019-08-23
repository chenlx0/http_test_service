# http_test_service

A simple http service for testing if your http request is correct.

Demo: http://test.imroot.cn

Example: 

```
$ curl http://test.imroot.cn/test/bbb\?x\=c\&yy\=334 -X "POST" -d "name=xiaodong" | json_pp

{
   "your_body" : "name=xiaodong",
   "method" : "POST",
   "time_str" : "2019-08-23 05:07:39pm",
   "your_headers" : {
      "Accept" : "*/*",
      "Host" : "test.imroot.cn",
      "Content-Type" : "application/x-www-form-urlencoded",
      "Content-Length" : "13",
      "User-Agent" : "curl/7.54.0"
   },
   "uri" : "/test/bbb?x=c&yy=334",
   "ip" : "59.111.198.100",
   "timestamp" : 1566551259
}
```
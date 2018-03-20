# wechat_mini_programs_sdk_for_php
# 安装
```php
composer require blackhilloldmonster/wechat_mini_programs_sdk_for_php
```

# 用法

```php
#获取小程序token
use BHOM\WechatMP\Token;

$appid
$appsecret
$token_info = Token::get_token($appid,$appsecret);
//返回参数示例
[
    "code"=>200,
    "message"=>"成功",
    "data"=>[
        "access_token"=>"asdfaasdfasdfasdfasdf",
        "expires_in"=>7200
    ]
]
```
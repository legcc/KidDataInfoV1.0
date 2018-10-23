<?php
return [
    '200' => 'success',
    '201' => 'parameter errors', #这个会动态的定义，会明确指出哪种参数错了。
    '202' => 'user does not exist',
    '203' => 'user already exist,please login directly',
    '204' => 'password is not right',
    '205' => 'auth code is not right',
    '206' => 'auth code is expired or not send',
    '207' => 'please do not repeat the application, our staff will contact you within 72 hours, please keep the phone clear',
    '208' => 'sorry, your requests are frequent. please try again in a minute',
    '209' => '暂不支持该角色用户登录！',
    '210' => '开课前15分钟不允许取消课程哦！',
    '211' => '找不到这个课程预约，或者课程预约已经失效，请刷新页面！',
    '400' => 'bad request params',
    '401' => 'unauthorized',
    '402' => 'too many attempts',
    '403' => 'forbidden or mentod not allowed',
    '404' => 'not found',
    '405' => 'method not allowed',
    '500' => 'internal server error',
    '503' => 'service unavailable',
];

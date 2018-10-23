<?php

namespace App\Http\Controllers;

use App\Http\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    use CommonTrait;
    public function shortUrl(Request $request)
    {
        //测试数据
        request()->offsetSet('url', 'https://blog.csdn.net/sanbingyutuoniao123/article/details/71124655');
        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return $this->outPutJson($request->all(), 201, $validator->errors()->first());
        }
        $url = 'https://dwz.cn/admin/create';
        $params = json_encode(['url' => request('url')]);
        $request_type = 'POST';

        //发起curl请求
        $res = $this->makeCurlRequest($url, $request_type, $params);
        //curl请求发生错误，返回错误信息
        if (starts_with($res, 'cURL Error #:')) {
            return $this->outPutJson('', 201, $res);
        }

        $res = json_decode($res);
        $res_code = $res->Code ?? -1;
        if ($res_code == 0) {
            return $this->outPutJson($res->ShortUrl);
        }

        $error_message = [
            '-1' => '短网址生成失败',
            '-2' => '长网址不合法',
            '-3' => '长网址存在安全隐患',
            '-4' => '长网址插入数据库失败',
            '-5' => '长网址在黑名单中，不允许注册',
        ];

        return $this->outPutJson('', 201, $message[$res_code]);
    }
}

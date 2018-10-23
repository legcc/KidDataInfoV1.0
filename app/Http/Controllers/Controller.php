<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function outPutJson($data = [], $code = 200, $message = null)
    {
        $message = $message ?? config('response_code')[$code] ?? '';
        return \Response::json(['message' => $message, 'status_code' => $code, 'data' => $data]);
    }
}

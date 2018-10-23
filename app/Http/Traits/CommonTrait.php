<?php

namespace App\Http\Traits;

trait CommonTrait
{

    public function outPutJson($data = '', $code = 200, $message = null)
    {
        $message = $message ?? config('response_code')[$code] ?? '';
        return \Response::json(['message' => $message, 'status_code' => $code, 'data' => $data]);
    }

    public function makeCurlRequest($url, $request_type, $params)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $request_type,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json; charset=UTF-8",
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return 'cURL Error #:' . $err;
        } else {
            return $response;
        }

    }

}

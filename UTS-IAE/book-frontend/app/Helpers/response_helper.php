<?php

if (!function_exists('response_success')) {
    function response_success($data = null, $message = 'Success', $code = 200)
    {
        return \Config\Services::response()
            ->setStatusCode($code)
            ->setJSON([
                'code' => $code,
                'status' => 'success',
                'message' => $message,
                'data' => $data
            ]);
    }
}

if (!function_exists('response_error')) {
    function response_error($message = 'Error', $code = 400, $data = null)
    {
        return \Config\Services::response()
            ->setStatusCode($code)
            ->setJSON([
                'code' => $code,
                'status' => 'error',
                'message' => $message,
                'data' => $data
            ]);
    }
}

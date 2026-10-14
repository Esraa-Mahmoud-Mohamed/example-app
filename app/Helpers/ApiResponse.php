<?php

namespace App\Helpers;

class ApiResponse
{
    public static function response($data, $message = null, $status = 200)
    {
        return response()->json([
            'data' => $data,
            'status' => $status,
            'message' => $message,
        ], $status);
    }
}
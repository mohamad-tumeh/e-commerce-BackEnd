<?php

namespace App\Helpers;


class Response
{
    public static function success($data = null)
    {
        return [
            'success' => true,
            'data' => $data,
        ];
    }

    public static function error($message): array
    {
        return [
            'success' => false,
            'message' => $message,
        ];
    }
}

<?php

namespace App\Http\Util;

class StatusResponse {

    private static function response(string $status, string $message) {
        return [
            "status"=> $status,
            "message"=> $message
        ];
    }

    public static function sucess(string $message) {
        return self::response("sucess", $message);
    }
    
    public static function error(string $message) {
        return self::response("error", $message);
    }
}
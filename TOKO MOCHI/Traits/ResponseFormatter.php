<?php
// File: traits/ResponseFormatter.php
namespace MochiShop\Traits;

trait ResponseFormatter {
    public function formatResponse($code, $message, $data = null) {
        return json_encode([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}

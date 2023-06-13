<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function response($success, $message, $data = [], $status = 200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'message' => $message,
        ], $status);
    }
    public function error($success, $message, $data = [], $status = 200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'errors' => $data,
        ], $status);
    }

}

<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait Response {

    /**
     * Response error
     *
     * @param string $message
     * @return json
     */
    public function responseError(string $message) {
        return response()->json([
            'success' => 'false',
            'data' => [
                'message' =>  $message,
            ]
        ], JsonResponse::HTTP_NOT_FOUND);
    }
}


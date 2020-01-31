<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait FormattedJsonResponse
{
    public function toJson(string $message, int $statusCode, bool $statusBool, object $resource = null) : JsonResponse
    {
        $data = [
            'status'    => $statusBool,
            'message'   => $message,
            'data'      => $resource
        ];
        if (is_null($resource)) unset($data['data']);

        return response()->json($data,$statusCode);
    }
}


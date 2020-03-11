<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait FormattedJsonResponse
{
    /*public function toJson(string $message, int $statusCode, object $resource = null)
    {
        return !is_null($resource) ?
                                      $resource->response()->setStatusCode($statusCode,$message):
                                      response()->json(['message'=> $message], $statusCode);
    }*/

    public function toJson(string $message, int $statusCode, object $resource = null)
    {
        $status = false;
        if($statusCode == 200)
            $status = true;

        return response()->json([
            'message'   => $message,
            'status'    => $status,
            'code'      => $statusCode,
            'data'      => $resource,
        ], $statusCode);
    }
}


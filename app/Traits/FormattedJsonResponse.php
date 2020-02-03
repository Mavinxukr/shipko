<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait FormattedJsonResponse
{
    public function toJson(string $message, int $statusCode, object $resource = null)
    {
        return !is_null($resource) ?
                                      $resource->response()->setStatusCode($statusCode,$message):
                                      response()->json(['message'=> $message], $statusCode);
    }
}


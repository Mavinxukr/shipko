<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait FormattedJsonResponse
{
    public function toJson(string $message, int $statusCode,
                           object $resource = null, bool $paginated = false)
    {
        $status = false;
        if($statusCode >= 200 && $statusCode <= 302)
            $status = true;

        $links = null;
        if($paginated){
            $links = [
                "first_page_url"    => $resource->url(1),
                "from"              => $resource->firstItem(),
                "last_page"         => $resource->lastPage(),
                "last_page_url"     => $resource->url($resource->lastPage()),
                "next_page_url"     => $resource->nextPageUrl(),
                "per_page"          => $resource->perPage(),
                "prev_page_url"     => $resource->previousPageUrl(),
                "to"                => $resource->lastItem(),
                "total"             => $resource->total()
            ];
        }

        $data['data'] = $resource;
        $data['links'] = $links;
        if(!is_null($resource) && $resource->additional){
            $data['additional'] = $resource->additional;
        }
        return response()->json([
            'message'   => $message,
            'status'    => $status,
            'code'      => $statusCode,
            'data'      => $data,
        ], $statusCode);
    }
}


<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'type'  => $this->type,
            'link'  => $this->path_to_front,
            'link_for_download' =>
                getenv('APP_URL_DOWNLOAD') .
                '?type=' . $this->type . '&id=' . $this->id,
        ];
    }
}

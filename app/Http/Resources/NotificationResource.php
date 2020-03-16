<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'id'        => $this->id,
            'type'      => $this->type,
            'body'      => $this->body,
            'is_new'    => $this->is_new,
            'created_at'=> $this->created_at->diffForHumans(),
        ];
    }
}
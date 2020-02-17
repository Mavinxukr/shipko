<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoFeatureInfoResource extends JsonResource
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
            'body_style'    => $this->body_style,
            'color'         => $this->color,
            'eng_type'      => $this->eng_type,
            'cylinder'      => $this->cylinder,
            'trans'         => $this->trans,
            'drive'         => $this->drive,
            'fuel'          => $this->fuel,
            'key'           => $this->key,
            'note'          => $this->note
        ];
    }
}

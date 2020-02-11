<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartResource extends JsonResource
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
            'id'            => $this->id,
            'client_id'     => $this->client_id,
            'catalog_number'=> $this->catalog_number,
            'name'          => $this->name,
            'make'          => $this->make,
            'vin'           => $this->vin,
            'quality'       => $this->quality,
            'container'     => $this->container,
            'images'        => PartImagesResource::collection($this->images)
        ];
    }
}

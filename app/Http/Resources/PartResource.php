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
            'auto'          => $this->auto,
            'vin'           => !is_null($this->getAuto) ? $this->getAuto->lotInfo->vin_code : null,
            'quality'       => $this->quality,
            'comment'       => $this->comment,
            'status'        => !is_null($this->getAuto) ? $this->getAuto->status : 'new',
            'delivery_date' => !is_null($this->getAuto) ?
                $this->getAuto->shipInfo->point_delivery_date : null,
            'images'        => PartImagesResource::collection($this->images),
            'container'     => !is_null($this->getAuto) && !is_null($this->getAuto->container) ?
                $this->getAuto->container->container_number : null,
        ];
    }
}

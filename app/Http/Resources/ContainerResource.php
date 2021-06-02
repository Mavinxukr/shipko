<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContainerResource extends JsonResource
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
            'id'                        => $this->id,
            'container_number'          => $this->container_number,
            'booking_number'            => $this->booking_number,
            'shipping_line'             => $this->shipping_line,
            'point_of_loading'          => $this->point_of_loading,
            'destination_port'          => $this->destination_port,
            'loading_date'              => $this->loading_date->format('Y-m-d'),
            'expected_sailing_date'     => $this->expected_sailing_date->format('Y-m-d'),
            'expected_arrival_date'     => $this->expected_arrival_date->format('Y-m-d'),
            'autos'                     => !is_null($this->autos) ?
                AutoResource::collection($this->autos) : null,
        ];
    }
}

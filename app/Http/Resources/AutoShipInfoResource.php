<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoShipInfoResource extends JsonResource
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
            'tracking_id'           => $this->tracking_id,
            'container_id'          => $this->container_id,
            'point_load'            =>[
                'city'       => $this->point_load_city,
                'date'       => $this->point_load_date,
            ],
            'point_delivery'        =>[
                'city'   => $this->point_delivery_city,
                'date'   => $this->point_delivery_date,
            ],
            'point_load_city'       => $this->point_load_city,
            'point_load_date'       => $this->point_load_date,
            'point_delivery_city'   => $this->point_delivery_city,
            'point_delivery_date'   => $this->point_delivery_date,
            'disassembly'           => $this->disassembly,
        ];
    }
}

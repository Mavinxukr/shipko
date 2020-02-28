<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoLotInfoResource extends JsonResource
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
            'lot_number'        => $this->lot_number,
            'doc_type'          => $this->doc_type,
            'odometer'          => $this->odometer,
            'highlight'         => $this->highlight,
            'pri_damage'        => $this->pri_damage,
            'sec_damage'        => $this->sec_damage,
            'ret_value'         => $this->ret_value,
            'vin_code'          => $this->vin_code,
        ];
    }
}

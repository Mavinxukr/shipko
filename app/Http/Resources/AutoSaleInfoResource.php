<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoSaleInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'location'      => $this->location,
            'grid_item'      => $this->grid_item,
            'sale_name'      => $this->sale_name,
            'ret_date'      => $this->ret_date,
        ];
    }
}

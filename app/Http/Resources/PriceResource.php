<?php

namespace App\Http\Resources;

use App\Models\Price\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
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
            'name'      => $this->name,
            'price'     => $this->price,
            'priceable' =>
                $this->priceable_type == Price::morphMap('client') ?
                new ClientResource($this->priceable) :
                new GroupResource($this->priceable),
            'cities'    => $this->cities()->pluck('name'),
        ];
    }
}

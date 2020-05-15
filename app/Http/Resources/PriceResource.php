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
        $priceable = $this->priceable_type == Price::morphMap('model', 'client') ?
            new ClientResource($this->priceable, false) :
            new GroupResource($this->priceable, false);

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'priceable_type'    => Price::morphMap('type', $this->priceable_type),
            'priceable_id'      => $this->priceable_id,
            'priceable'         => $priceable,
            'cities'            => $this->cities()->select('id', 'name', 'price')->get(),
        ];
    }
}

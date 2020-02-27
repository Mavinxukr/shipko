<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PopularAutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = $this->documents()->where('type', 'auction_picture')->first();

        return [
            'id'            => $this->id,
            'model_name'    => $this->model_name,
            'lot_info'      =>[
                'lot_number'           => !is_null($this->lotInfo) ? $this->lotInfo->lot_number : null,
            ],
            'sale_info'     =>[
                'location'      => !is_null($this->saleInfo) ? $this->saleInfo->location : null,
            ],
            'document'      => new DocumentResource($image),
        ];
    }
}

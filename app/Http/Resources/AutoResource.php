<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoResource extends JsonResource
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
            'model_name'    => $this->model_name,
            'ship_info'     => new AutoShipInfoResource($this->shipInfo),
            'sale_info'     => new AutoSaleInfoResource($this->saleInfo),
            'feature_info'  => new AutoFeatureInfoResource($this->featureInfo),
            'lot_info'      => new AutoLotInfoResource($this->lotInfo),
            'document'      => AutoDocumentResource::collection($this->documents)
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoResource extends JsonResource
{
    protected $autos;

    public function __construct($resource, $autos=null)
    {
        $this->autos = $autos;
        parent::__construct($resource);
    }


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $avatar = $this->documents()->where('type', 'auction_picture')->first();

        return [
            'id'            => $this->id,
            'model_name'    => $this->model_name,
            'status'        => $this->status,
            'created_at'    => $this->created_at->format('d/m/Y'),
            'ship_info'     => new AutoShipInfoResource($this->shipInfo),
            'sale_info'     => new AutoSaleInfoResource($this->saleInfo),
            'feature_info'  => new AutoFeatureInfoResource($this->featureInfo),
            'lot_info'      => new AutoLotInfoResource($this->lotInfo),
            'document'      => DocumentResource::collection($this->documents),
            'shipping'      => new AutoShippingResource($this->shipping),
            'invoice'       => new InvoiceResource($this->invoice),
            'vehicles'      => $this->autos,
            'image'         => new DocumentResource($avatar),
        ];
    }
}

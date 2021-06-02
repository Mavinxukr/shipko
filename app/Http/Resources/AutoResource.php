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
            'auto'          => $this->year . ' ' . $this->make_name . ' ' . $this->model_name,
            'year'          => $this->year,
            'make_name'     => $this->make_name,
            'model_name'    => $this->model_name,
            'offsite'       => $this->offsite,
            'offsite_price' => $this->offsite_price,
            'auction'       => $this->auction,
            'client'        => new ClientResource($this->client, false),
            'status'        => $this->status,
            'created_at'    => $this->purchased_date->format('d/m/Y'),
            'ship_info'     => new AutoShipInfoResource($this->shipInfo),
            'sale_info'     => new AutoSaleInfoResource($this->saleInfo),
            'feature_info'  => new AutoFeatureInfoResource($this->featureInfo),
            'lot_info'      => new AutoLotInfoResource($this->lotInfo),
            'document'      => DocumentResource::collection($this->documents),
            'shipping'      => new AutoShippingResource($this->shipping),
            'invoice'       => new InvoiceResource($this->invoice),
            'vehicles'      => $this->autos,
            'image'         => new DocumentResource($avatar),
            'notes'         => AutoNoteResource::collection($this->notes),
            'container'     => !is_null($this->container) ?
                [
                    'id'                        => $this->container->id,
                    'container_number'          => $this->container->container_number,
                    'booking_number'            => $this->container->booking_number,
                    'shipping_line'             => $this->container->shipping_line,
                    'point_of_loading'          => $this->container->point_of_loading,
                    'destination_port'          => $this->container->destination_port,
                    'loading_date'              => $this->container->loading_date->format('Y-m-d'),
                    'expected_sailing_date'     => $this->container->expected_sailing_date->format('Y-m-d'),
                    'expected_arrival_date'     => $this->container->expected_arrival_date->format('Y-m-d'),
                ] : null
        ];
    }
}

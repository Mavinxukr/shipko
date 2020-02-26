<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientOverviewResource extends JsonResource
{
    protected $autos;
    protected $client_autos;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $autos, $client_autos)
    {
        $this->autos = $autos;
        $this->client_autos = $client_autos;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $latest_shippings = null;
        $latest_invoices = null;
        if(!is_null($this->client_autos))
            foreach ($this->client_autos as $auto){
                $latest_shippings[] = new AutoShippingResource($auto->shipping);
                $latest_invoices[] = new InvoiceResource($auto->invoice);
            }

        return [
            'vehicles'          => AutoResource::collection($this->autos),
            'latest_shippings'  => $latest_shippings,
            'latest_invoices'   => $latest_invoices,
        ];
    }
}

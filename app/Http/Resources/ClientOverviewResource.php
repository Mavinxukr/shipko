<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientOverviewResource extends JsonResource
{
    protected $autos;
    protected $client_autos_shipping;
    protected $client_autos_invoice;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $autos, $client_autos_shipping, $client_autos_invoice)
    {
        $this->autos = $autos;
        $this->client_autos_shipping = $client_autos_shipping;
        $this->client_autos_invoice = $client_autos_invoice;
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
        if(!is_null($this->client_autos_shipping))
            foreach ($this->client_autos_shipping as $auto_shipping){
                if(!is_null($auto_shipping)){
                    $latest_shippings[] = new AutoResource($auto_shipping);
                }
            }

        if(!is_null($this->client_autos_invoice))
            foreach ($this->client_autos_invoice as $auto_invoice){
                if(!is_null($auto_invoice)){
                    $latest_invoices[] = new InvoiceResource($auto_invoice->invoice);
                }
            }

        return [
            'vehicles'          => $this->autos,
            'latest_shippings'  => $latest_shippings,
            'latest_invoices'   => $latest_invoices,
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Invoice\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'id'                        => $this->id,
            'name_car'                  => $this->name_car,
            'status'                    => $this->status,
            'total_price'               => $this->total_price,
            'paid_price'                => $this->paid_price,
            'outstanding_price'         => $this->outstanding_price,
            'total_shipping_price'      => $this->total_shipping_price,
            'paid_shipping_price'       => $this->paid_shipping_price,
            'outstanding_shipping_price'=> $this->outstanding_shipping_price,
            'status_shipping'           => $this->status_shipping,
            'date'                      => $this->created_at->format('d/m/Y'),
            'auto'                      => new AutoResource($this->auto),
            'documents'                 => DocumentResource::collection($this->documents),
        ];
    }

}

<?php

namespace App\Http\Resources;

use App\Models\Invoice\Invoice;
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
            'user'                      => new ClientResource($this->client),
            'documents'                 => DocumentResource::collection($this->documents),
            'totalAmount'               => Invoice::whereNotNull('total_price')->sum('total_price'),
            'totalOutstanding'          => Invoice::whereNotNull('outstanding_price')->sum('outstanding_price'),
            'totalPaid'                 => Invoice::whereNotNull('paid_price')->sum('paid_price')
        ];
    }


}

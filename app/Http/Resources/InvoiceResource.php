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
        if($this->auto->offsite){
            $totalPrice = $this->tatal_price + $this->auto->offsite_price;
        }else{
            $totalPrice = $this->tatal_price;
        }

        return [
            'id'                        => $this->id,
            'name_car'                  => $this->name_car,
            'status'                    => $this->status,
            'total'                     => [$totalPrice, $this->total_shipping_price],
            'paid'                      => [$this->paid_price,$this->paid_shipping_price],
            'outstanding'               => [$this->outstanding_price, $this->outstanding_shipping_price],
            'total_price'               => $totalPrice,
            'paid_price'                => $this->paid_price,
            'outstanding_price'         => $this->outstanding_price,
            'total_shipping_price'      => $this->total_shipping_price,
            'paid_shipping_price'       => $this->paid_shipping_price,
            'outstanding_shipping_price'=> $this->outstanding_shipping_price,
            'status_shipping'           => $this->status_shipping,
            'date'                      => $this->created_at->format('d/m/Y'),
            'documents'                 => DocumentResource::collection($this->documents),
        ];
    }

}

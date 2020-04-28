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
            $totalPrice = $this->total_price + $this->auto->offsite_price;
        }else{
            $totalPrice = $this->total_price;
        }

        return [
            'id'                        => $this->id,
            'name_car'                  => $this->name_car,
            'paiment_for'               => ['Auction invoice', 'Shipping charge invoice'],
            'total'                     => [$totalPrice, $this->total_shipping_price],
            'paid'                      => [$this->paid_price,$this->paid_shipping_price],
            'outstanding'               => [$this->outstanding_price, $this->outstanding_shipping_price],
            'status'                    => [$this->status, $this->status_shipping],
            'total_price'               => $totalPrice,
            'paid_price'                => $this->paid_price,
            'outstanding_price'         => $this->outstanding_price,
            'total_shipping_price'      => $this->total_shipping_price,
            'paid_shipping_price'       => $this->paid_shipping_price,
            'outstanding_shipping_price'=> $this->outstanding_shipping_price,
            //'status'                    => $this->status,
            'status_shipping'           => $this->status_shipping,
            'date'                      => $this->created_at->format('d/m/Y'),
            'documents'                 => DocumentResource::collection($this->documents),
        ];
    }

}

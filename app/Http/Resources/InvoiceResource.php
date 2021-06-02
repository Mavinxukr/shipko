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
            $outstandingPrice = $this->outstanding_price + $this->auto->offsite_price;
        }else{
            $totalPrice = $this->total_price;
            $outstandingPrice = $this->outstanding_price;
        }

        if($this->auto->auction){
            $totalShippingPrice = $this->total_shipping_price + 50;
        }else{
            $totalShippingPrice = $this->total_shipping_price;
        }

        $due_day = $this->due_day->diff(Carbon::now());

        if($due_day->h > 0){
            $due_day = $due_day->d + 1;
        }else{
            $due_day = $due_day->d;
        }

        return [
            'id'                        => $this->id,
            'name_car'                  => $this->name_car,
            'paiment_for'               => ['Auction invoice', 'Shipping charge invoice'],
            'total'                     => [$totalPrice, $this->total_shipping_price],
            'paid'                      => [$this->paid_price,$this->paid_shipping_price],
            'outstanding'               => [$outstandingPrice, $this->outstanding_shipping_price],
            'status'                    => [$this->status, $this->status_shipping],
            'total_price'               => $totalPrice,
            'paid_price'                => $this->paid_price,
            'outstanding_price'         => $outstandingPrice,
            'total_shipping_price'      => $totalShippingPrice,
            'paid_shipping_price'       => $this->paid_shipping_price,
            'outstanding_shipping_price'=> $this->outstanding_shipping_price,
            //'status'                    => $this->status,
            'status_shipping'           => $this->status_shipping,
            'date'                      => $this->auto->purchased_date->format('d/m/Y'),
            'vin'                       => $this->auto->lotInfo->vin_code,
            'client_id'                 => $this->auto->client_id,
            'due_day'                   => $due_day,
            'documents'                 => DocumentResource::collection($this->documents),
        ];
    }

}

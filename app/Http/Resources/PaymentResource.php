<?php

namespace App\Http\Resources;

use App\Models\Payment\Payment;
use App\Models\Price\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $applicable = $this->applicable_type == Payment::morphMap(
            'model', 'client') ?
            new ClientResource($this->applicable, false) :
            new GroupResource($this->applicable, false);

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'due_day'           => $this->due_day,
            'applicable_type'   => Payment::morphMap('type', $this->applicable_type),
            'applicable_id'     => $this->applicable_id,
            'applicable'        => $applicable,
        ];
    }
}

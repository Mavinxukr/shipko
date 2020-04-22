<?php

namespace App\Http\Resources;

use App\Models\Price\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    private $nesting;

    public function __construct($resource, $nesting=true)
    {
        $this->nesting = $nesting;
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
        $priceable = null;
        if($this->nesting){
            $priceable = $this->priceable_type == Price::morphMap('client') ?
                new ClientResource($this->priceable, false) :
                new GroupResource($this->priceable, false);
        }

        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'price'     => $this->price,
            'due_day'   => $this->due_day->diffInDays(),
            'priceable' =>$priceable,
            'cities'    => $this->cities()->pluck('name'),
        ];
    }
}

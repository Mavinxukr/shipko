<?php

namespace App\Http\Resources;

use App\Models\Auto\ShipInfo;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoByTrackingIdResource extends JsonResource
{
    private $shipInfo;

    public function __construct($resource, ShipInfo $shipInfo)
    {
        $this->shipInfo = $shipInfo;
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
        $auto_id = null;
        foreach ($this->resource as $item){
            $auto_id[] = $item->id;
        }

        return [
            'auto_id'   => $auto_id,
            'from'      => $this->shipInfo->point_load_city,
            'to'      => $this->shipInfo->point_delivery_city,
        ];
    }
}

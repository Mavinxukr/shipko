<?php

namespace App\Http\Resources;

use App\Traits\Service\ClientService\DueDayService;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
        $dueDay = null;
        if(!is_null($this->priceable)){
            $dueDay = DueDayService::dueDay($this->priceable);
        }

        $clients = null;
        if($this->nesting){
            $clients = !is_null($this->clients) ?
                GroupAttachResource::collection($this->clients) : null;
        }

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => $this->price,
            'clients'       => $clients,
            'price_id'      => !is_null($dueDay) ? $dueDay['price_id'] : null,
            'due_day'       => !is_null($dueDay) ? $dueDay['pastDays']->d : null,
            'is_finish'     => !is_null($dueDay) ? $dueDay['finish'] : false,
        ];
    }
}

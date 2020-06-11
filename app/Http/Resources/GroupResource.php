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

        $clients = null;
        if($this->nesting || $this->nesting === 0){
            $clients = !is_null($this->clients) ?
                GroupAttachResource::collection($this->clients) : null;
        }

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => !is_null($this->priceable) ? $this->priceable->cities : null,
            'clients'       => $clients,
            'due_day'       => !is_null($this->applicable) ? $this->applicable->due_day : null
        ];
    }
}

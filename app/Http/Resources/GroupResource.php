<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        $finish = false;
        if(!is_null($this->priceable)){
            $pastDays = Carbon::now()->diff($this->priceable->created_at);
            $allDays = $this->priceable->due_day->diff($this->priceable->created_at);

            if($allDays->d <= $pastDays->d){
                $finish = true;
            }else{
                $finish = false;
            }
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
            'due_day'       => !is_null($pastDays) ? $pastDays->d : null,
            'is_finish'     => $finish,
        ];
    }
}

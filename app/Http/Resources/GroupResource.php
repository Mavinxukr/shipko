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
        $calcDays = null;
        $finish = false;
        if(!is_null($this->priceable)){
            $calcDays = Carbon::now()->diff($this->priceable->created_at);

            if($this->priceable->due_day <= $calcDays){
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
            'due_day'       => $calcDays->d,
            'is_finish'     => $finish,
        ];
    }
}

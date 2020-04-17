<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutoNoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->user_type == 'admin'){
            $client = collect([
                'name'  => $this->admin->name,
            ]);
        }else{
            $client = new ClientResource($this->client);
        }

        return [
            'client'        => $client,
            'comment'       => $this->comment,
            'created_at'    => $this->created_at
        ];
    }
}

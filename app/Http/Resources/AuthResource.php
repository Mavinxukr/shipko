<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */


    public function toArray($request)
    {
        return [
            'user' => [
                'id'            => $this->id,
                'name'          => $this->name,
                'email'         => $this->email,
            ],
            'auth' => [
                'token'  =>  "Bearer " .$this->createToken('shipko')->accessToken
            ],
        ];
    }
}

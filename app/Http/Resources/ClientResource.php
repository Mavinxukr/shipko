<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
{

    public function toArray($request)
    {
        return  [
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'username'      =>  $this->username,
            'email'         =>  $this->email,
            'phone'         =>  $this->phone,
            'card_number'   =>  $this->card_number,
            'country'       =>  $this->country->name ?? null,
            'city'          =>  $this->city->name ?? null,
            'zip'           =>  $this->zip->name ?? null,
            'address'       =>  $this->address->name ?? null,
            'image'         =>  !is_null($this->image) ? $this->image->path_to_front : null,
            'date_register' =>  $this->created_at->format('d.m.Y'),
            ];
    }

}

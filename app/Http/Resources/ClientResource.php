<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
{

    public function toArray($request)
    {
        $country       =  $this->country->name ?? "";
        $city          =  $this->city->name ?? "";
        $zip           =  $this->zip->name ?? "";
        $address       =  $this->address->name ?? "";

        $full_address = $country . " " . $city . " " . $address . " " . $zip;

        return  [
            'id'                =>  $this->id,
            'name'              =>  $this->name,
            'username'          =>  $this->username,
            'email'             =>  $this->email,
            'phone'             =>  $this->phone,
            'card_number'       =>  $this->card_number,
            'country'           =>  $this->country->name ?? null,
            'city'              =>  $this->city->name ?? null,
            'zip'               =>  $this->zip->name ?? null,
            'address'           =>  $this->address->name ?? null,
            'image'             =>  !is_null($this->image) ? $this->image->path_to_front : null,
            'date_register'     =>  $this->created_at->format('d.m.Y'),
            'full_address'      =>  $full_address,
            'new_notification'  =>  $this->notifications()->where('is_new', 1)->count(),
            ];
    }

}

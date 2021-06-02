<?php

namespace App\Http\Resources;

use App\Traits\Service\ClientService\DueDayService;
use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
{
    private $nesting;

    public function __construct($resource, $nesting=true)
    {
        $this->nesting = $nesting;
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        $country       =  $this->country->name ?? "";
        $city          =  $this->city->name ?? "";

        return  [
            'id'                =>  $this->id,
            'name'              =>  $this->name,
            'username'          =>  $this->username,
            'email'             =>  $this->email,
            'phone'             =>  $this->phone,
            'country'           =>  $this->country->name ?? null,
            'city'              =>  $this->city->name ?? null,
            'image'             =>  !is_null($this->image) ? $this->image->path_to_front : null,
            'date_register'     =>  $this->created_at->format('d.m.Y'),
            'full_address'      =>  $country . " " . $city,
            'new_notification'  =>  $this->notifications()->where('is_new', 1)->count(),
            'due_day'           =>  !is_null($this->applicable) ? $this->applicable->due_day : null
            ];
    }
}

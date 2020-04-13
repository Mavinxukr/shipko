<?php

namespace App\Models\Group;

use App\Models\Price\Price;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'price',
    ];

    public function clients()
    {
        return $this->hasMany(GroupAttach::class)->with('client');
    }

    public function price()
    {
        return $this->morphOne(Price::class, 'priceable');
    }

}

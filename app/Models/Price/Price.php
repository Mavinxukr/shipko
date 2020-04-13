<?php

namespace App\Models\Price;

use App\Models\Client\City;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'name', 'price', 'priceable_id', 'priceable_type'
    ];

    public static function morphMap($type)
    {
        $types = [
            'client'    => 'App\Models\Client\Client',
            'group'     => 'App\Models\Group\Group',
        ];
        if(!isset($types[$type]))
            throw new \Exception('Type not support', 400);

        return $types[$type];
    }

    public function priceable()
    {
        return $this->morphTo();
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'price_city');
    }
}

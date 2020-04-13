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

<?php

namespace App\Models\Price;

use App\Models\Client\City;
use App\Models\Client\Country;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'name', 'priceable_id',
        'priceable_type'
    ];

    public $appends = [
        'price_value'
    ];

    public function getValueAttribute(){
        return $this->pivot->price_value;
    }

    public static function morphMap($convert, $type)
    {
        $types = [
            'client'    => 'App\Models\Client\Client',
            'group'     => 'App\Models\Group\Group',
        ];

        if($convert == 'model'){
            if(!isset($types[$type]))
                throw new \Exception('Type not support', 400);

            return $types[$type];
        }else{
            return array_search($type, $types);
        }
    }

    public function priceable()
    {
        return $this->morphTo();
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'price_city')->withPivot('price_value');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

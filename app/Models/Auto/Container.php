<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = [
        'container_number', 'booking_number',
        'shipping_line', 'point_of_loading',
        'destination_port', 'loading_date',
        'expected_sailing_date', 'expected_arrival_date',
    ];

    protected $casts = [
        'loading_date'              => 'date',
        'expected_sailing_date'     => 'date',
        'expected_arrival_date'     => 'date',
    ];

    public function autos()
    {
        return $this->hasMany(Auto::class);
    }
}


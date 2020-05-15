<?php

namespace App\Models\Payment;

use App\Models\Client\City;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name', 'applicable_id',
        'applicable_type', 'due_day'
    ];

    protected $casts = [
        'due_day' => 'datetime',
    ];

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

    public function applicable()
    {
        return $this->morphTo();
    }
}

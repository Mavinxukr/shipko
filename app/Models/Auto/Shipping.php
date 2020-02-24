<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'auto_id', 'status'
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class, 'auto_id', 'id');
    }
}

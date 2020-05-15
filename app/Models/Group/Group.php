<?php

namespace App\Models\Group;

use App\Models\Payment\Payment;
use App\Models\Price\Price;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
    ];

    public function clients()
    {
        return $this->hasMany(GroupAttach::class)->with('client');
    }

    public function priceable()
    {
        return $this->morphOne(Price::class, 'priceable', 'priceable_type');
    }

    public function applicable()
    {
        return $this->morphOne(Payment::class, 'applicable', 'applicable_type');
    }
}

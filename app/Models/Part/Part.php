<?php

namespace App\Models\Part;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'client_id','catalog_number',
        'name','make','vin','quality',
        'container'
    ];

    public function images()
    {
        return $this->hasMany(Photo::class,'part_id');
    }
}

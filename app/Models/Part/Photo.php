<?php

namespace App\Models\Part;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'part_images';
    protected $fillable = [
        'path_to_front','name',
        'part_id','folder_link'
    ];
}

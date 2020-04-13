<?php

namespace App\Models\Group;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class GroupAttach extends Model
{
    protected $fillable = [
        'group_id', 'client_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

<?php

namespace App\Models\Group;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class GroupAttach extends Model
{
    protected $fillable = [
        'group_id', 'client_id'
    ];

    protected $hidden = [
        'group_id', 'client_id', 'created_at', 'updated_at',
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

<?php

namespace App\Models\Notification;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'client_id', 'type', 'body', 'is_new',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

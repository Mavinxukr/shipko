<?php

namespace App\Models\Auto;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class AutoNotes extends Model
{
    protected $fillable = [
        'client_id', 'auto_id', 'comment',
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

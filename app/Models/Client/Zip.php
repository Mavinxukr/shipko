<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client\Zip
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Zip whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Zip extends Model
{
    protected  $fillable = [
        'name'
    ];
}

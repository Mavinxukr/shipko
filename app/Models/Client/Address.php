<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client\Address
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Address whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    protected  $fillable = [
        'name'
    ];
}

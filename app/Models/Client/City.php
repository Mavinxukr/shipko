<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client\City
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    protected  $fillable = [
        'name', 'short_name', 'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client\Country
 *
 * @property int $id
 * @property string $ name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    protected $fillable = ['name'];
}

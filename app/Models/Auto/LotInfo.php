<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auto\LotInfo
 *
 * @property int $id
 * @property string $doc_type
 * @property string $odometer
 * @property string $highlight
 * @property string $pri_damage
 * @property string $sec_damage
 * @property string $ret_value
 * @property string $vin_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereDocType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereHighlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereOdometer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo wherePriDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereRetValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereSecDamage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereVinCode($value)
 * @mixin \Eloquent
 * @property int $auto_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\LotInfo whereAutoId($value)
 */
class LotInfo extends Model
{
    protected $fillable = [
        'lot_number', 'doc_type','odometer',
        'highlight', 'pri_damage','sec_damage',
        'ret_value', 'vin_code','auto_id'
    ];
}

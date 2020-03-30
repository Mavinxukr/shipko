<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auto\ShipInfo
 *
 * @property int $id
 * @property string $container_id
 * @property string $point_load_city
 * @property string $point_load_date
 * @property string $point_delivery_city
 * @property string $point_delivery_date
 * @property bool $disassembly
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereContainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereDisassembly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo wherePointDeliveryCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo wherePointDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo wherePointLoadCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo wherePointLoadDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $tracking_id
 * @property int $auto_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\ShipInfo whereTrackingId($value)
 */
class ShipInfo extends Model
{
    protected  $fillable = [
        'container_id','point_load_city',
        'point_load_date','point_delivery_city',
        'point_delivery_date','disassembly','tracking_id',
        'auto_id', 'damage_status'
    ];

    protected $casts = [
        'disassembly' => 'boolean'
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
}

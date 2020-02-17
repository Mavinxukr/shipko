<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auto\Auto
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Auto\ShipInfo $shipInfo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereFeatureInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereLotInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereSaleInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereShipInfoId($value)
 */
class Auto extends Model
{
    protected $fillable = [
        'model_name'
    ];

    public function shipInfo()
    {
        return $this->hasOne(ShipInfo::class);
    }

    public function lotInfo()
    {
        return $this->hasOne(LotInfo::class);
    }
    public function saleInfo()
    {
        return $this->hasOne(SaleInfo::class);
    }

    public function featureInfo()
    {
        return $this->hasOne(FeatureInfo::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

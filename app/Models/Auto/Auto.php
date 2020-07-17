<?php

namespace App\Models\Auto;

use App\Models\Client\Client;
use App\Models\Invoice\Invoice;
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
 * @property string $model_name
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auto\Document[] $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\Auto\FeatureInfo $featureInfo
 * @property-read \App\Models\Auto\LotInfo $lotInfo
 * @property-read \App\Models\Auto\SaleInfo $saleInfo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Auto whereUserId($value)
 */
class Auto extends Model
{
    protected $fillable = [
        'year','make_name','model_name',
        'client_id', 'status', 'offsite', 'offsite_price',
        'purchased_date', 'auction',
    ];

    protected $casts = [
        'purchased_date' => 'date'
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

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function notes()
    {
        return $this->hasMany(AutoNotes::class);
    }
}

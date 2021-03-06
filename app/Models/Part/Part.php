<?php

namespace App\Models\Part;

use App\Models\Auto\Auto;
use App\Models\Auto\LotInfo;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Part\Part
 *
 * @property int $id
 * @property string $client_id
 * @property string $catalog_number
 * @property string $name
 * @property string $make
 * @property string $vin
 * @property string $quality
 * @property string $container
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Part\Photo[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereCatalogNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Part whereVin($value)
 * @mixin \Eloquent
 */
class Part extends Model
{
    protected $fillable = [
        'client_id','catalog_number',
        'name','auto','quality', 'auto_id'
    ];

    public function images()
    {
        return $this->hasMany(Photo::class,'part_id');
    }

    public function lot()
    {
        return $this->belongsTo(LotInfo::class, 'vin', 'vin_code');
    }

    public function getAuto()
    {
        return $this->belongsTo(Auto::class, 'auto_id', 'id');
    }
}

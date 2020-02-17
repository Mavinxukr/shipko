<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auto\FeatureInfo
 *
 * @property int $id
 * @property string $body_style
 * @property string $color
 * @property string $eng_type
 * @property string $cylinder
 * @property string $trans
 * @property string $drive
 * @property string $fuel
 * @property string $key
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereBodyStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereCylinder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereDrive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereEngType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereFuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereTrans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\FeatureInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FeatureInfo extends Model
{
    protected $fillable = [
        'body_style','color','eng_type',
        'cylinder','trans','drive',
        'fuel','key','note','auto_id'
    ];
}

<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auto\SaleInfo
 *
 * @property int $id
 * @property string $location
 * @property string $grid_item
 * @property string $sale_name
 * @property string $ret_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereGridItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereRetValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereSaleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $auto_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\SaleInfo whereRetDate($value)
 */
class SaleInfo extends Model
{
    protected $fillable = [
        'location','grid_item','sale_name',
        'ret_date','auto_id'
    ];
}

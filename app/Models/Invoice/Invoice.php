<?php

namespace App\Models\Invoice;

use App\Models\Auto\Auto;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Invoice\Invoice
 *
 * @property int $id
 * @property string $name_car
 * @property string $status
 * @property float $total_price
 * @property float $paid_price
 * @property float $outstanding_price
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereNameCar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereOutstandingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice wherePaidPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\Invoice whereUserId($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    protected $fillable = [
        'name_car','status','total_price',
        'paid_price','outstanding_price',
        'total_shipping_price', 'paid_shipping_price','outstanding_shipping_price',
        'auto_id'
    ];

    public function auto()
    {
        return $this->belongsTo(Auto::class,'auto_id');
    }

    public function documents()
    {
        return $this->hasMany(InvoiceDocument::class);
    }
}

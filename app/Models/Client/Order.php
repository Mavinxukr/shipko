<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client\Order
 *
 * @property int $id
 * @property string $tracking_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order whereTrackingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    //
}

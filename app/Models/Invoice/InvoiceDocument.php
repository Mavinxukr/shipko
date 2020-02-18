<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Invoice\InvoiceDocument
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $path_to_front
 * @property string $path_to_folder
 * @property int $invoice_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument wherePathToFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument wherePathToFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Invoice\InvoiceDocument whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceDocument extends Model
{
    protected $fillable = [
        'type','auto_id','name',
        'path_to_front','path_to_folder'
    ];
}

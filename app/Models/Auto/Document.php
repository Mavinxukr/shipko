<?php

namespace App\Models\Auto;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auto\Document
 *
 * @property int $id
 * @property string $image_type
 * @property int $auto_id
 * @property string $name
 * @property string $path_to_front
 * @property string $path_to_folder
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereAutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereImageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document wherePathToFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document wherePathToFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auto\Document whereType($value)
 */
class Document extends Model
{
    protected $fillable = [
        'type','auto_id','name',
        'path_to_front','path_to_folder'
    ];
}

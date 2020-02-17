<?php

namespace App\Models\Part;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Part\Photo
 *
 * @property int $id
 * @property string $path_to_front
 * @property string $name
 * @property string $folder_link
 * @property int $part_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo whereFolderLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo wherePathToFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Part\Photo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Photo extends Model
{
    protected $table = 'part_images';
    protected $fillable = [
        'path_to_front','name',
        'part_id','folder_link'
    ];
}

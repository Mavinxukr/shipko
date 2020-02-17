<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client\ClientImage
 *
 * @property int $id
 * @property string $path_to_front
 * @property string $path_to_folder
 * @property string $name
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage wherePathToFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage wherePathToFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereUserId($value)
 * @mixin \Eloquent
 * @property string $folder_link
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Client\ClientImage whereFolderLink($value)
 */
class ClientImage extends Model
{
    protected $fillable = [
        'path_to_front','folder_link',
        'name','client_id',
    ];
}

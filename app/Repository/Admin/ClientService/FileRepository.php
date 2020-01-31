<?php


namespace App\Repository\Admin\ClientService;

use App\Contracts\vendor\ClientService\FileCreatorInterface;
use App\Models\Client\ClientImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Storage;

class FileRepository implements FileCreatorInterface
{
    public function imageCreator(Model $model, string $entity,UploadedFile $file) :void
    {
        if (!is_null($file)){
                $ext = explode("/", $file->getClientMimeType());
                $name = Str::random('60').'.'.end($ext);
                $path = "image/$entity/$model->id/$name";
             $this->imageDeleter($model);
            ClientImage::updateOrCreate(['client_id' => $model->id],
                [
                    'path_to_front'     => config('app.image_path').$path,
                    'name'              => $name,
                    'client_id'         => $model->id,
                    'folder_link'       => $path
                ]);
                Storage::disk('public')->put($path,file_get_contents($file));
            }
    }

    public function imageDeleter(Model $model): void
    {
        if ( !empty($model->image) &&
            Storage::disk('public')->exists($model->image->folder_link))
            Storage::disk('public')->delete($model->image->folder_link);
    }

    public function folderDeleter(Model $model, string $entity): void
    {
        Storage::disk('public')->deleteDirectory("image/$entity/$model->id");
    }
}

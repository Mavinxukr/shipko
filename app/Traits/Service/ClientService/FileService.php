<?php


namespace App\Traits\Service\ClientService;


use App\Models\Client\ClientImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Str;

trait FileService
{
    public function imageCreator(Model $model, string $entity, Model $modelImage, UploadedFile $file) :void
    {
        if (!is_null($file)){
            $ext = explode("/", $file->getClientMimeType());
            $name = Str::random('60').'.'.end($ext);
            $path = "image/$entity/$model->id/$name";
            $arrayData = [
                'path_to_front'     => config('app.image_path').$path,
                'name'              => $name,
                 $entity.'_id'      => $model->id,
                'folder_link'       => $path
            ];

            $modelImage::create($arrayData);
            Storage::disk('public')->put($path,file_get_contents($file));
        }
    }

    public function imageDeleter(Model $model): void
    {
        if (!empty($model->image) &&
            Storage::disk('public')->exists($model->image->folder_link))
            Storage::disk('public')->delete($model->image->folder_link);

        $model->image()->delete();
    }

    public function folderDeleter(string $entity): void
    {
        Storage::disk('public')->deleteDir("image/$entity");
    }

}

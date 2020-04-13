<?php


namespace App\Traits\Service\AutoService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Str;

trait UploadDocuments
{
    public function saveDocuments(Model $model, array $documents, string $entity) : void
    {
        foreach ($documents as $document){
            $ext = explode("/", $document['file']->getClientOriginalExtension());
            $name = Str::random('60').'.'.end($ext);
            $path = "image/$entity/documents/$model->id/$name";
            $arrayData = [
                'type'              => $document['type'],
                'path_to_front'     => config('app.image_path').$path,
                'name'              => $name,
                "{$entity}_id"      => $model->id,
                'path_to_folder'    => $path
            ];
            $model->documents()->create($arrayData);
            Storage::disk('public')->put($path,file_get_contents($document['file']));
        }
    }

    public function deleteDocument(array $documents, Model $model, $entity)
    {
        foreach ($documents as $document){
            $item = $model->documents()->find($document);
            if (Storage::disk('public')->exists($item->path_to_folder))
                Storage::disk('public')->delete($item->path_to_folder);
            $item->delete();
        }
        if (!count(Storage::files("public/image/$entity/documents/$model->id"))){
            $this->folderDeleter($entity, $model);
        }

    }
    public function folderDeleter(string $entity, Model $model): void
    {
        Storage::disk('public')->deleteDir("image/$entity/documents/$model->id");
    }
}

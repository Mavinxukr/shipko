<?php


namespace App\Traits\Service\AutoService;


use App\Models\Auto\Auto;
use App\Models\Auto\Document;
use File;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Str;

trait UploadDocuments
{
    public function saveDocuments(Model $model, array $documents) : void
    {
        foreach ($documents as $document){
            $ext = explode("/", $document['file']->getClientMimeType());
            $name = Str::random('60').'.'.end($ext);
            $path = "image/auto/documents/$model->id/$name";
            $arrayData = [
                'type'              => $document['type'],
                'path_to_front'     => config('app.image_path').$path,
                'name'              => $name,
                'auto_id'           => $model->id,
                'path_to_folder'    => $path
            ];
            Document::create($arrayData);
            Storage::disk('public')->put($path,file_get_contents($document['file']));
        }
    }

    public function deleteDocument(array $documents, Auto $auto)
    {
        foreach ($documents as $document){
            $item = Document::findOrFail($document);
            if (Storage::disk('public')->exists($item->path_to_folder))
                Storage::disk('public')->delete($item->path_to_folder);
            $item->delete();
        }
        if (!count(Storage::files("public/image/auto/documents/$auto->id"))){
            $this->folderDeleter('auto', $auto);
        }

    }
    public function folderDeleter(string $entity, Auto $auto): void
    {
        Storage::disk('public')
                            ->deleteDir("image/$entity/documents/$auto->id");
    }
}

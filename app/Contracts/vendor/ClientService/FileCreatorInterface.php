<?php


namespace App\Contracts\vendor\ClientService;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


interface FileCreatorInterface
{
    public function imageCreator(Model $model, string $entity, UploadedFile $file) :void;

    public function imageDeleter(Model $model) :void ;

    public function folderDeleter(Model $model, string $entity) : void ;
}

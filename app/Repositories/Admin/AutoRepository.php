<?php


namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoContract;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\Service\AutoService\UploadDocuments;
use Illuminate\Http\Request;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse, UploadDocuments,AutoAction;

    public function index()
    {
        $autos = Auto::latest('id')->paginate(10);
        return $this->toJson('Auto show successfully',200 ,AutoResource::collection($autos));
    }

    public function show(int $id)
    {
        return $this->toJson('Auto show by id successfully',201 ,
            new AutoResource(Auto::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $data = $request->except('model_name');
        $auto  = Auto::create($request->only('model_name'));
        $this->updateOrCreateAction($data, $auto);
        return $this->toJson('Auto created successfully',201,
                                                        new AutoResource($auto));

    }

    public function update(Request $request, int $id)
    {
        $auto =  Auto::findOrFail($id);
        $auto->model_name = $request->model_name ?? $auto->model_name;
        $auto->save();
        $data = array_filter($request->except('model_name'));
        $this->updateOrCreateAction($data, $auto);
        return $this->toJson('Auto updated successfully',200,
                        new AutoResource($auto));
    }

    public function destroy(int $id)
    {
       $auto = Auto::findOrFail($id);
       $documents = $auto->documents()->pluck('id')
                                        ->toArray();
       if (count($documents)) $this->deleteDocument($documents, $auto);
       $auto->delete();
       return $this->toJson('Auto deleted successfully',200, null);

    }

    public function restoreImage(Request $request, int  $id)
    {
        $auto = Auto::findOrFail($id);
        $this->saveDocuments($auto,$request->document);
        return $this->toJson('Auto document restore successfully',
            200, new AutoResource($auto));
    }

    public function deleteImage(Request $request, int $id)
    {
        $auto = Auto::findOrFail($id);
        $ids = explode(',',$request->ids);
        $documents =  $auto->documents()->find($ids)->pluck('id')
                                                    ->toArray();
        if (count($documents)) $this->deleteDocument($documents, $auto);
        return $this->toJson('Auto document deleted successfully',200,
                                            null);
    }

}

<?php


namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoContract;
use App\Http\Resources\AutoByTrackingIdResource;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Models\Auto\ShipInfo;
use App\Traits\FormattedJsonResponse;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\Service\AutoService\UploadDocuments;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse, UploadDocuments,AutoAction, SortCollection;

    public function autoByContainer(Request $request)
    {
        $shipInfo = ShipInfo::where('tracking_id', $request->tracking_id)
            ->with('auto')
            ->get();
        foreach ($shipInfo as $item){
            $autos[] = $item->auto;
        }


        return $this->toJson('Auto get by container successfully',200 ,
            new AutoByTrackingIdResource($autos, $shipInfo->first()));
    }

    public function index()
    {
        $search = \request('search');
        $status = \request('status');
        $client = \request('client_id');

        $model = Auto::query();

        if(!is_null($search)){
            $model->whereHas('lotInfo', function (Builder $query) use($search){
                $query->where('vin_code', 'like', "%$search%" );
            });
        }

        if(!is_null($client)){
            $model->whereHas('client', function (Builder $query) use($client){
               $query->where('id', $client);
            });
        }

        if(!is_null($status)){
            $model->where('status', $status);
        }

        $autos = $this->getWithSort($model,
            \request('countpage'), \request('order_type'), \request('order_by'));

        return $this->toJson('Auto show successfully',200 ,
            AutoResource::collection($autos), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Auto show by id successfully',200 ,
            new AutoResource(Auto::findOrFail($id)));
    }

    public function store(Request $request)
    {
        $data = $request->except(['model_name','client_id']);
        $auto  = Auto::create($request->only(['model_name','client_id', 'status']));
        $this->updateOrCreateAction($data, $auto);
        return $this->toJson('Auto created successfully',201,
                                                        new AutoResource($auto));

    }

    public function update(Request $request, int $id)
    {
        $auto =  Auto::findOrFail($id);
        $auto->update(array_filter($request->only(['model_name','client_id', 'status'])));
        $data = array_filter($request->except(['model_name','client_id', 'status']), function ($value){
            return !is_null($value);
        });
        $this->updateOrCreateAction($data, $auto);
        $auto = $auto->fresh();
        return $this->toJson('Auto updated successfully',200,
                        new AutoResource($auto));
    }

    public function delete(Request $request)
    {
        $autos =  Auto::whereIn('id', $request->auto_id)->get();
        foreach ($autos as $auto){
            $documents = $auto->documents()->pluck('id')
                ->toArray();
            if (count($documents)) $this->deleteDocument($documents, $auto,'auto');
            $auto->delete();
        }

        return $this->toJson('Autos deleted successfully', 200, null);
    }

    public function destroy(int $id)
    {
       $auto = Auto::findOrFail($id);
       $documents = $auto->documents()->pluck('id')
                                        ->toArray();
       if (count($documents)) $this->deleteDocument($documents, $auto,'auto');
       $auto->delete();
       return $this->toJson('Auto deleted successfully',200, null);
    }

    public function restoreImage(Request $request, int  $id)
    {
        $auto = Auto::findOrFail($id);
        $this->saveDocuments($auto,$request->document,'auto');
        return $this->toJson('Auto document restore successfully',
            200, new AutoResource($auto));
    }

    public function deleteImage(Request $request, int $id)
    {
        $auto = Auto::findOrFail($id);
        $ids = explode(',',$request->ids);
        $documents =  $auto->documents()->find($ids)->pluck('id')
                                                    ->toArray();
        if (count($documents)) $this->deleteDocument($documents, $auto,'auto');
        return $this->toJson('Auto document deleted successfully',200,
            new AutoResource($auto->fresh()));
    }

}

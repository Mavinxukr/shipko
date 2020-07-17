<?php

namespace App\Repositories\Admin;

use App\Contracts\ContractRepositories\Admin\AutoContract;
use App\Http\Resources\AutoByTrackingIdResource;
use App\Http\Resources\AutoResource;
use App\Models\Auto\Auto;
use App\Models\Auto\ShipInfo;
use App\Models\Client\Client;
use App\Traits\FormattedJsonResponse;
use App\Traits\GetAdditional;
use App\Traits\Service\AutoService\AutoAction;
use App\Traits\Service\AutoService\AutoFilterCollection;
use App\Traits\Service\AutoService\UploadDocuments;
use App\Traits\SortCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AutoRepository implements AutoContract
{
    use FormattedJsonResponse, UploadDocuments, AutoAction, SortCollection, AutoFilterCollection;

    public function autoByContainer(Request $request)
    {
        $shipInfo = ShipInfo::where('tracking_id', $request->tracking_id)
            ->with('auto')
            ->get();

        $autos = [];
        foreach ($shipInfo as $item){
            $autos[] = $item->auto;
        }

        if($autos){
            $data = new AutoByTrackingIdResource($autos, $shipInfo->first());
        }

        return $this->toJson('Auto get by container successfully',200,
            $data ?? null);
    }

    public function index()
    {
        $status = \request('auto_status');

        $model = Auto::query();

        if(!is_null($status)){
            $model->where('status', $status);
        }

        $model = $this->getAutoWithFilter($model);

        $autos = $this->getWithSort($model,
            \request('countpage'),
            \request('order_type'),
            \request('order_by'));

        return $this->toJson('Autos get all successfully',200 ,
            AutoResource::collection($autos)->additional(array_merge($this->getAdditional(), $this->getFilters())), true);
    }

    public function show(int $id)
    {
        return $this->toJson('Auto get by id successfully',200 ,
            new AutoResource(Auto::findOrFail($id)));
    }

    public function store(Request $request)
    {
        if(!Client::whereId($request->client_id)->exists())
            return $this->toJson('Client not found',404, null);

        $data = $request->except(['year','make_name','model_name','client_id', 'offsite', 'offsite_price']);
        $auto  = Auto::create($request->only(['year','make_name','model_name','client_id', 'status', 'offsite', 'offsite_price']));
        $this->updateOrCreateAction($data, $auto);

        $document = $request->only('invoice_document');
        $invoice = $this->updateOrCreateInvoice($request, $auto);
        if (isset($document['invoice_document']))
            $this->saveDocuments($invoice,$document['invoice_document'],'invoice');


        return $this->index();
        /*return $this->toJson('Auto created successfully',201,
            new AutoResource($auto));*/
    }

    public function update(Request $request, int $id)
    {
        $auto =  Auto::findOrFail($id);
        $auto->update(array_filter($request->only([
            'year','make_name','model_name','client_id', 'status', 'offsite', 'offsite_price'
        ]), function ($value){
            return !is_null($value);
        }));
        $data = array_filter($request->except(['year','make_name','model_name','client_id', 'status', 'offsite', 'offsite_price']), function ($value){
            return !is_null($value);
        });
        $this->updateOrCreateAction($data, $auto);
        $this->updateOrCreateInvoice($request, $auto);
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

        return $this->index();
        /*return $this->toJson('Autos deleted successfully', 200, null);*/
    }

    public function destroy(int $id)
    {
       $auto = Auto::findOrFail($id);
       $documents = $auto->documents()->pluck('id')
                                        ->toArray();
       if (count($documents)) $this->deleteDocument($documents, $auto,'auto');
       $auto->delete();

       return $this->index();
       /*return $this->toJson('Auto deleted successfully',200, null);*/
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
    public function getAdditional()
    {
        return GetAdditional::get(['cities', 'states', 'clients']);
    }

}
